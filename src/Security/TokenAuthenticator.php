<?php
namespace App\Security;

use App\Entity\Agency;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CredentialsExpiredException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class TokenAuthenticator extends SocialAuthenticator
{
    /** @var EntityManagerInterface */
    private EntityManagerInterface $em;

    /** @var string|null */
    private ?string $token;

    /** @var object|null */
    private ?object $jwtHeader;

    /** @var object|null */
    private ?object $jwtPayload;

    /** @var ContainerBagInterface */
    private ContainerBagInterface $params;

    public function __construct(EntityManagerInterface $em, ContainerBagInterface $params)
    {
        $this->em = $em;
        $this->params = $params;
    }

    /**
     * Called on every request to decide if this authenticator should be
     * used for the request. Returning `false` will cause this authenticator
     * to be skipped.
     * @param Request $request
     * @return bool
     */
    public function supports(Request $request): bool
    {
        return ($request->headers->has('authorization') ) ;
    }

    /**
     * Called on every request. Return whatever credentials you want to
     * be passed to getUser() as $credentials.
     * @param Request $request
     * @return string
     */
    public function getCredentials(Request $request): string
    {
        return $this->getToken($request) ;
    }

    /**
     * @return bool
     */
    public function validToken(): bool
    {
        $this->decodeToken();
        $dateTime = time();
        return $dateTime < $this->jwtPayload->exp && $this->params->get('kid') == $this->jwtHeader->kid ;
    }

    /**
     * Extract token from request
     * @param Request $request
     * @return string
     */
    public function getToken(Request $request): string
    {
        $headerParts = explode(' ', $request->headers->get('authorization'));

        if (!(2 === count($headerParts) && 0 === strcasecmp($headerParts[0], 'Bearer'))) {
           throw new \Symfony\Component\Security\Core\Exception\AuthenticationServiceException();
        }
        $this->token = $headerParts[1];

        return $headerParts[1];

    }

    /**
     * @return object
     */
    public function decodeToken(): object
    {
        $tokenParts = explode(".", $this->token);
        $tokenHeader = base64_decode($tokenParts[0]);

        // ça permet de corriger le problème des prénoms ou des noms qui ont des accents
        $tokenPayload = str_replace('_', '/', str_replace('-','+',$tokenParts[1]));

        $payload = base64_decode($tokenPayload);
        $this->jwtHeader = json_decode($tokenHeader);
        $this->jwtPayload = json_decode($payload);

        return $this->jwtPayload;

    }

    /**
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     * @return UserInterface|null
     * @throws Exception
     */
    public function getUser($credentials, UserProviderInterface  $userProvider): ?UserInterface
    {
        $validToken= $this->validToken() ;

        if(!$validToken) {
            throw new CredentialsExpiredException();
        }
        if (null === $credentials) {
            // The token header was empty, authentication fails with HTTP Status
            // Code 401 "Unauthorized"
            return null;
        }

        $username = $this->jwtPayload->preferred_username;
        /** @var User|null $user */
        $user = $this->em->getRepository(User::class)->findOneByUsername($username);

        if ($user === null) {
            $this->createAndAddUser($this->jwtPayload);
        }

        // The "username" in this case is the apiToken, see the key `property`
        // of `your_db_provider` in `security.yaml`.
        // If this returns a user, checkCredentials() is called next:
        return $userProvider->loadUserByIdentifier($this->jwtPayload->preferred_username);
    }

    /**
     * @param mixed $credentials
     * @param UserInterface $user
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user): bool
    {
        // Check credentials - e.g. make sure the password is valid.
        // In case of an API token, no credential check is needed.

        // Return `true` to cause authentication success
        return true;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     * @return Response|null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey): ?Response
    {
        // on success, let the request continue
        return null;
    }

    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return Response|null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null): Response
    {

        $data = [
            // you might translate this message
            'message' => 'Authentication Required',
        ];
        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe(): bool
    {
        return false;
    }

    /**
     * Créer et rajouter l'utilisateur en base de données s'il n'existe pas
     *
     * @param object $jwtPayload
     * @throws Exception
     */
    public function createAndAddUser(object $jwtPayload): void
    {
        try {
            $newUser = new User();
            $newUser->setUsername($jwtPayload->preferred_username)
                ->setFirstName($jwtPayload->given_name)
                ->setActive(true)
                ->setLastName($jwtPayload->family_name)
                ->setEmail($jwtPayload->email)
                ->addRoles($jwtPayload->roles)
                ->setPhoneNumber(null)
                ->setCreatedAt(new \DateTime());

            $newUser->setAgency($this->getAgencyByName($jwtPayload->office));

            $this->em->persist($newUser);
            $this->em->flush();

        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

    }

    /**
     * vérifie si l'agence existe en base de données si oui, on la retourne directement
     * sinon on l'a rajoute en base de donnée
     */
    public function getAgencyByName(string $agencyName): Agency {
        /** @var Agency|null $agency */
        $agency = $this->em->getRepository(Agency::class)->findOneByName($agencyName);

        if ($agency === null) {
            $agency = new Agency();
            $agency->setName($agencyName)
                ->setCreatedAt(new \DateTime());

            $this->em->persist($agency);
            $this->em->flush();
        }

        return $agency;
    }
}
