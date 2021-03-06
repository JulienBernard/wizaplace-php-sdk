<?php
/**
 * @copyright Copyright (c) Wizacha
 * @license Proprietary
 */
declare(strict_types=1);

namespace Wizaplace\SDK\Vendor\Order;

use function theodorejb\polycast\to_int;

final class Order
{
    /** @var int */
    private $orderId;

    /** @var int */
    private $customerUserId;

    /** @var string */
    private $customerEmail;

    /** @var string */
    private $customerFirstName;

    /** @var string */
    private $customerLastName;

    /** @var float */
    private $discountAmount;

    /** @var string */
    private $invoiceNumber;

    /** @var string */
    private $declineReason;

    /** @var bool */
    private $needsShipping;

    /** @var int[] */
    private $shipmentsIds;

    /** @var float */
    private $shippingCost;

    /** @var string */
    private $notes;

    /** @var float */
    private $taxSubtotal;

    /** @var OrderTax[] */
    private $taxes;

    /** @var float */
    private $total;

    /** @var OrderStatus */
    private $status;

    /** @var \DateTimeImmutable */
    private $createdAt;

    /** @var OrderAddress */
    private $billingAddress;

    /** @var OrderAddress */
    private $shippingAddress;

    /** @var OrderItem[] */
    private $items;

    /** @var string */
    private $comment;

    /** @var int */
    private $companyId;

    /**
     * @internal
     */
    public function __construct(array $data)
    {
        $this->orderId = $data['order_id'];
        $this->companyId = $data['company_id'];
        $this->customerUserId = $data['user_id'];
        $this->customerEmail = $data['email'];
        $this->customerFirstName = $data['customer_firstname'];
        $this->customerLastName = $data['customer_lastname'];
        $this->discountAmount = $data['discount'];
        $this->invoiceNumber = $data['invoice_number'];
        $this->declineReason = $data['decline_reason'] ?? '';
        $this->needsShipping = $data['need_shipping'];
        $this->shipmentsIds = array_map(static function ($v): int {
            return to_int($v);
        }, $data['shipment_ids']);
        $this->shippingCost = $data['shipping_cost'];
        $this->notes = $data['notes'];
        $this->taxSubtotal = $data['tax_subtotal'];
        $this->total = $data['total'];
        $this->status = new OrderStatus($data['status']);
        $this->createdAt = new \DateTimeImmutable('@'.$data['timestamp']);
        $this->billingAddress = OrderAddress::extractBillingAddressData($data);
        $this->shippingAddress = OrderAddress::extractShippingAddressData($data);
        $this->taxes = array_map(function (array $itemData): OrderTax {
            return new OrderTax($itemData);
        }, $data['taxes']);
        $this->items = array_map(function (array $itemData): OrderItem {
            return new OrderItem($itemData);
        }, $data['products']);
        $this->comment = $data['notes'] ?? '';
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getCustomerUserId(): int
    {
        return $this->customerUserId;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getCustomerFirstName(): string
    {
        return $this->customerFirstName;
    }

    public function getCustomerLastName(): string
    {
        return $this->customerLastName;
    }

    public function getDiscountAmount(): float
    {
        return $this->discountAmount;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function getDeclineReason(): string
    {
        return $this->declineReason;
    }

    public function needsShipping(): bool
    {
        return $this->needsShipping;
    }

    /**
     * @return int[]
     */
    public function getShipmentsIds(): array
    {
        return $this->shipmentsIds;
    }

    public function getShippingCost(): float
    {
        return $this->shippingCost;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function getTaxSubtotal(): float
    {
        return $this->taxSubtotal;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getStatus(): OrderStatus
    {
        return $this->status;
    }

    public function getBillingAddress(): OrderAddress
    {
        return $this->billingAddress;
    }

    public function getShippingAddress(): OrderAddress
    {
        return $this->shippingAddress;
    }

    /**
     * @return OrderTax[]
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * @return OrderItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getComment(): string
    {
        return $this->comment;
    }
}
