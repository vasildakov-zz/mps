<?php declare(strict_types = 1);

namespace Mps\Domain\Offer;

/**
 * Class OfferRepository
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class OfferRepository
{
    /**
     * @var array
     */
    private $offers = [];

    /**
     * @param  Offer  $offer
     */
    public function persist(Offer $offer)
    {
        $this->offers[] = $offer;
    }


    /**
     * @param  string $id
     * @return null|Offer
     */
    public function find($id)
    {
        foreach ($this->offers as $offer) {
            if ($id == $offer->getId()) {
                return $offer;
            }
        }
        return null;
    }


    /**
     * @param  string $productId
     * @return null|Offer
     */
    public function findByProductId($productId)
    {
        foreach ($this->offers as $offer) {
            if ($productId == $offer->getProductId()) {
                return $offer;
            }
        }
        return null;
    }
}
