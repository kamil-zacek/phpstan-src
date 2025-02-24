<?php declare(strict_types = 1);

namespace PHPStan\PhpDoc;

use PHPStan\Php\PhpVersion;

final class ReflectionClassStubFilesExtension implements StubFilesExtension
{

	public function __construct(private PhpVersion $phpVersion)
	{
	}

	public function getFiles(): array
	{
		if (!$this->phpVersion->supportsLazyObjects()) {
			return [
				__DIR__ . '/../../stubs/ReflectionClass.stub',
			];
		}

		return [
			__DIR__ . '/../../stubs/ReflectionClassWithLazyObjects.stub',
		];
	}

}
