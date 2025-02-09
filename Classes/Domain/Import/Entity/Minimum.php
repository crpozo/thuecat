<?php

declare(strict_types=1);

/*
 * Copyright (C) 2021 Daniel Siepmann <coding@daniel-siepmann.de>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301, USA.
 */

namespace WerkraumMedia\ThueCat\Domain\Import\Entity;

abstract class Minimum
{
    /**
     * URL to the original source at ThüCAT.
     * Not unique within our system. We have one entity per language,
     * while ThüCAT has a single entity containing all languages.
     *
     * @var string
     */
    protected $id = '';

    /**
     * Short name of the thing.
     * Can be translated.
     *
     * @var string
     */
    protected $name = '';

    /**
     * Long text describing the thing.
     * Can be translated.
     *
     * @var string
     */
    protected $description = '';

    /**
     * URL to official version of this thing outside of ThüCAT.
     *
     * @var string[]
     */
    protected $urls = [];

    public function getId(): string
    {
        return $this->id;
    }

    public function hasName(): bool
    {
        return trim($this->name) !== '';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @internal for mapping via Symfony component.
     */
    public function setId(string $url): void
    {
        $this->id = $url;
    }

    /**
     * @internal for mapping via Symfony component.
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @internal for mapping via Symfony component.
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @internal for mapping via Symfony component.
     * @param string|array $url
     */
    public function setUrl($url): void
    {
        if (is_string($url)) {
            $url = [$url];
        }
        $this->urls = $url;
    }

    public static function getPriority(): int
    {
        return 10;
    }
}
