<?php
/**
 * @copyright Copyright (c) Wizacha
 * @license Proprietary
 */
declare(strict_types=1);

namespace Wizaplace\SDK\Exception;

final class OrderNotFound extends NotFound implements DomainError
{
    /**
     * @var array
     */
    private $context;

    /**
     * @internal
     */
    public function __construct(string $message, array $context = [], ?\Throwable $previous = null)
    {
        $this->context = $context;

        parent::__construct($message, $previous);
    }

    final public function getContext(): array
    {
        return $this->context;
    }

    public static function getErrorCode(): ErrorCode
    {
        return ErrorCode::ORDER_NOT_FOUND();
    }
}
