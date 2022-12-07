<?php

namespace App\Day7;

class Directory implements ItemInterface
{
    /** @var array<ItemInterface> */
    private array $children = [];

    private ?Directory $parent;

    public function __construct(string $name, Directory $parent = null)
    {
        $this->name = $name;
        $this->parent = $parent;
    }

    public function getParent(): ?Directory
    {
        return $this->parent;
    }

    public function isRoot()
    {
        return null === $this->parent;
    }

    public function getChildren(): array
    {
        return [];
    }

    public function addChildren(ItemInterface $item)
    {
        $this->children[] = $item;
    }

    public function getSize(): int
    {
        return array_sum(array_map(fn(ItemInterface $item) => $item->getSize(), $this->children));
    }

    public function getName(): string
    {
        return $this->name;
    }

    /** @return array<Directory> */
    public function getDirectories()
    {
        return array_filter($this->children, fn($item) => $item instanceof Directory);
    }
    private function getFiles()
    {
        return array_filter($this->children, fn($item) => $item instanceof File);
    }

    public function getRoot()
    {
        return $this->isRoot() ? $this : $this->getParent()->getRoot();
    }

    public function tree()
    {
        $files = [];
        $directories = [];
        foreach ($this->getFiles() as $file) {
            $files[$file->getName()] = $file->getSize();
        }
        foreach ($this->getDirectories() as $directory) {
            $directories[$directory->getName()] = $directory->tree();
        }

        return [...$files, ...$directories];
    }
}