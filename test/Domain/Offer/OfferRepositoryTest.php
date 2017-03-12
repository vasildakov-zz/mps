<?php declare(strict_types = 1);

namespace MpsTest\Domain\Offer;

use Mps\Domain\Offer\Offer;
use Mps\Domain\Offer\OfferRepository;

/**
 * OfferRepositoryTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class OfferRepositoryTest extends \PHPUnit\Framework\TestCase
{

    protected function setUp()
    {
        $this->repository = new OfferRepository();

        $this->repository->persist(new Offer('1', '1', 3, 130));
        $this->repository->persist(new Offer('2', '2', 2, 45));
    }

    /**
     * @test
     */
    public function findReturnsOffer()
    {
        $offer = $this->repository->find(1);

        self::assertInstanceOf(Offer::class, $offer);
    }

    /**
     * @test
     */
    public function findReturnsNull()
    {
        self::assertNull($this->repository->find(999));
    }

    /**
     * @test
     */
    public function findByProductIdReturnsOffer()
    {
        $offer = $this->repository->findByProductId(1);

        self::assertInstanceOf(Offer::class, $offer);
    }

    /**
     * @test
     */
    public function findByProductIdReturnsNull()
    {
        self::assertNull($this->repository->findByProductId(999));
    }
}
