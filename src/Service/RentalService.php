<?php
namespace App\Service;

use App\Exception\AgencyAccessException;
use App\Repository\RentalRepository;
use DateTime;
use App\Entity\Rental;
use App\Entity\User;

class RentalService
{
    protected RentalRepository $rentalRepository;


    /**
     * RentalService constructor.
     */
    public function __construct(RentalRepository $rentalRepository)
    {
        $this->rentalRepository = $rentalRepository;
    }


    /**
     * Test maximum duration of the rental
     */
    public function maxDurationExceed(User $user, Rental $rental): bool
    {

        $start = $rental->getStartDate();
        $due = $rental->getDueDate();
        $days = $due->diff($start)->days;

        if ($days >= Rental::MAX_RENTAL_DURATION) {
            return true;
        }

        $rentals = $this->rentalRepository->findBy(['user' => $user, 'item' => $rental->getItem()]);

        $daysSum = 0;

        if (count($rentals)) {
            $daysSum = array_sum(
                array_map(function (Rental $rental) use ($daysSum) {
                    $start = $rental->getStartDate();
                    $end = $rental->getEndDate() ?? $rental->getDueDate();

                    return $end->diff($start)->days;

                }, $rentals));
        }

        return (($days) > Rental::MAX_RENTAL_DURATION);
    }

    /**
     * Test minimum waiting between two rentals for one user and one item
     * Je ne peux pas réserver un même article moins de 4 jours après ma dernière réservation
     * pour cet article (ex : dernière réservation du 2021-02-01 au 2021-02-08,
     * prochaine réservation pas avant le 2021-02-12)Je ne peux pas réserver un même article moins de 4 jours
     * après ma dernière réservation pour cet article
     * (ex : dernière réservation du 2021-02-01 au 2021-02-08, prochaine réservation pas avant le 2021-02-12)
     */
    public function minimumWaitingExceed(Rental $rental, $user): bool
    {
        $nbRental = $user->getRentals()->count();

        // aucune location
        if($nbRental === 0){
            return false;
        }

        return $this->rentalRepository->hasNeighboringRentals($user, $rental);
    }


    /**
     * Test if the start date of the rental is before the end date
     */
    public function checkDatesValid(Rental $rental) :bool
    {
        return $rental->getDueDate() >= $rental->getStartDate() && $rental->getStartDate() >= new DateTime();
    }

    /** vérifier si l'article se trouve de l'agence de l'utilisateur courant */
    public function checkAgencyAccess(User $user, Rental $rental): void
    {
        if ($user->getAgency() !== $rental->getItem()->getAgency()) {
            throw new AgencyAccessException();
        }
    }
}
