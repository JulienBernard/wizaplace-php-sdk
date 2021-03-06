<?php
/**
 * @copyright Copyright (c) Wizacha
 * @license Proprietary
 */
declare(strict_types=1);

namespace Wizaplace\SDK\Basket;

use Wizaplace\SDK\Catalog\DeclinationId;
use function theodorejb\polycast\to_string;

final class ProductComment extends Comment
{
    /**
     * @var DeclinationId
     */
    private $declinationId;

    public function __construct(DeclinationId $declinationId, string $comment)
    {
        parent::__construct($comment);

        $this->declinationId = $declinationId;
    }

    public function getDeclinationId(): DeclinationId
    {
        return $this->declinationId;
    }

    /**
     * @internal
     */
    public function toArray(): array
    {
        return [
            'declinationId' => to_string($this->declinationId),
            'comment' => $this->comment,
        ];
    }
}
