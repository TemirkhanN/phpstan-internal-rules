<?php

declare(strict_types=1);

namespace Temirkhan\PhpstanInternalRule;

class NamespaceChecker
{
    public static function arePartOfTheSamePackage(string $someNamespace, string $anotherNamespace): bool
    {
        if ($someNamespace === $anotherNamespace) {
            return true;
        }

        $someNamespaceParts    = explode('\\', $someNamespace);
        $anotherNamespaceParts = explode('\\', $anotherNamespace);

        foreach ($someNamespaceParts as $key => $part) {
            if (!isset($anotherNamespaceParts[$key])) {
                break;
            }

            if ($anotherNamespaceParts[$key] !== $part) {
                return false;
            }
        }

        return true;
    }
}
