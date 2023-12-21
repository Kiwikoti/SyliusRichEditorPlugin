<?php

/*
 * This file is part of Monsieur Biz' Rich Editor plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusRichEditorPlugin\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class YoutubeUrlValidator extends ConstraintValidator
{
    public const YOUTUBE_REGEX_VALIDATOR = '`^(?:https?://)?(?:www\.)?(?:youtu.be/|youtube\.com/(?:watch(?:/|/?\?(?:\S*&)?v=)|embed/))([\w\d-]+)$`';

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof YoutubeUrl) {
            throw new UnexpectedTypeException($constraint, YoutubeUrl::class);
        }

        if (!\is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (!preg_match(self::YOUTUBE_REGEX_VALIDATOR, $value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation()
            ;
        }
    }
}
