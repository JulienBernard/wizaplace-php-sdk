<?php
/**
 * @copyright Copyright (c) Wizacha
 * @license Proprietary
 */
declare(strict_types = 1);

namespace Wizaplace\SDK\Order;

final class Order
{
    /** @var int */
    private $id;
    /** @var int */
    private $companyId;
    /** @var string */
    private $companyName;
    /** @var float */
    private $total;
    /** @var float */
    private $subtotal;
    /** @var float */
    private $taxtotal;
    /** @var \DateTimeImmutable */
    private $timestamp;
    /** @var OrderStatus */
    private $status;
    /** @var string */
    private $shippingName;
    /** @var ShippingAddress */
    private $shippingAddress;
    /** @var BillingAddress */
    private $billingAddress;
    /** @var OrderItem[] */
    private $orderItems;
    /** @var string */
    private $customerComment;
    /** @var Payment */
    private $payment;

    /**
     * @internal
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->companyId = $data['companyId'];
        $this->companyName = $data['companyName'];
        $this->total = $data['total'];
        $this->subtotal = $data['subtotal'];
        $this->taxtotal = $data['taxTotal'];
        $this->timestamp = new \DateTimeImmutable('@'.$data['timestamp']);
        $this->status = new OrderStatus($data['status']);
        $this->shippingName = $data['shippingName'];
        $this->shippingAddress = new ShippingAddress($data['shippingAddress']);
        $this->billingAddress = new BillingAddress($data['billingAddress']);
        $this->orderItems = array_map(static function (array $orderItemData) : OrderItem {
            return new OrderItem($orderItemData);
        }, $data['items']);
        $this->customerComment = $data['customerComment'];
        $this->payment = new Payment($data['payment']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    public function getTaxtotal(): float
    {
        return $this->taxtotal;
    }

    public function getTimestamp(): \DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function getStatus(): OrderStatus
    {
        return $this->status;
    }

    public function getShippingName(): string
    {
        return $this->shippingName;
    }

    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    public function getBillingAddress(): BillingAddress
    {
        return $this->billingAddress;
    }

    /**
     * @return OrderItem[]
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    public function getCustomerComment(): string
    {
        return $this->customerComment;
    }

    public function getPayment(): Payment
    {
        return $this->payment;
    }
}
