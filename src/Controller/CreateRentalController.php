<?php

namespace App\Controller;

use App\Entity\Rental;
use App\Entity\User;
use App\Exception\AgencyAccessException;
use App\Service\RentalService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Exception\MaximumRentalDurationException;
use App\Exception\MinimumWaitingException;;
use App\Exception\EndDateBeforeStartDateException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;


final class CreateRentalController extends AbstractController
{

    private RentalService $rentalService;

    /**
     * @param RentalService $rentalService
     */
    public function __construct(RentalService $rentalService)
    {
        $this->rentalService = $rentalService;
    }

    /**
     * @param Rental $data
     * @return Rental
     * @throws AgencyAccessException
     * @throws EndDateBeforeStartDateException
     * @throws MaximumRentalDurationException
     * @throws MinimumWaitingException
     */
    public function __invoke(Rental $data): Rental
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            throw new AuthenticationException('Authentication Required');
        }

        // vérifier si l'article se trouve de l'agence de l'utilisateur courant
        $this->rentalService->checkAgencyAccess($user, $data);
        
        $isWaitingExceed = $this->rentalService->minimumWaitingExceed($data,$user);
        if(!$isWaitingExceed){
            $isStartDateBeforeEndDate = $this->rentalService->checkDatesValid($data);
            if($isStartDateBeforeEndDate){
                $isDurationExceed = $this->rentalService->maxDurationExceed($user, $data);
                if(!$isDurationExceed){
                    return $data;
                }
                else{
                    throw new MaximumRentalDurationException();
                }
            }else{
                throw new EndDateBeforeStartDateException();
            }
        }else{
            throw new MinimumWaitingException();
        }
    }
}
