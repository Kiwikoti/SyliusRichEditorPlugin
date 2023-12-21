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

namespace MonsieurBiz\SyliusRichEditorPlugin\UiElement;

use JsonSerializable;
use MonsieurBiz\SyliusRichEditorPlugin\Exception\UiElementNotFoundException;

interface RegistryInterface extends JsonSerializable
{
    public function addUiElement(UiElementInterface $uiElement): void;

    public function hasUiElement(string $code): bool;

    /**
     * @throws UiElementNotFoundException
     */
    public function getUiElement(string $code): UiElementInterface;

    /**
     * @return UiElementInterface[]
     */
    public function getUiElements(): array;
}
