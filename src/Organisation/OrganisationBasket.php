<?php
/**
 * @copyright Copyright (c) Wizacha
 * @license Proprietary
 */
namespace Wizaplace\SDK\Organisation;

class OrganisationBasket
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $locked;

    /**
     * @var boolean
     */
    private $checkout;

    /**
     * @var boolean
     */
    private $accepted;

    /**
     * @var \DateTime
     */
    private $createdAt;

    public function __construct(array $data)
    {
        $this->setId($data['basketId']);
        $this->setUserId($data['userId']);
        $this->setName($data['name']);
        $this->setLocked($data['locked']);
        $this->setCheckout($data['checkout']);
        $this->setAccepted($data['accepted']);
        $this->setCreatedAt(\DateTime::createFromFormat(\DateTime::RFC3339, $data['createdAt']));
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->locked;
    }

    /**
     * @param bool $locked
     */
    public function setLocked(bool $locked): void
    {
        $this->locked = $locked;
    }

    /**
     * @return bool
     */
    public function isAccepted(): bool
    {
        return $this->accepted;
    }

    /**
     * @param bool $accepted
     */
    public function setAccepted(bool $accepted): void
    {
        $this->accepted = $accepted;
    }

    /**
     * @return bool
     */
    public function isCheckout(): bool
    {
        return $this->checkout;
    }

    /**
     * @param bool $checkout
     */
    public function setCheckout(bool $checkout): void
    {
        $this->checkout = $checkout;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
