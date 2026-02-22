<?php

class Validator
{
    public static function string($value, int $min = 1, ?int $max = null, string $field = ''): ?string
    {
        $value = trim((string) $value);

        // Required check (empty after trim)
        if (strlen($value) === 0) {
            return self::formatError($field, 'is required.');
        }

        // Minimum length
        if (strlen($value) < $min) {
            return self::formatError($field, "must be at least {$min} characters long.");
        }

        // Maximum length (only if $max is set)
        if ($max !== null && strlen($value) > $max) {
            return self::formatError($field, "must be no more than {$max} characters long.");
        }

        return null; // Valid

    }

    public static function email(mixed $value, string $field = ''): ?string
    {
        $value = trim((string) $value);

        // Required check
        if (strlen($value) === 0) {
            return self::formatError($field, 'is required.');
        }

        // Email format validation
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return self::formatError($field, 'must be a valid email address.');
        }

        return null; // Valid

    }

    // Helper for consistent error messages
    private static function formatError(string $field, string $message): string
    {
        $label = $field ? ucfirst(trim($field)) : 'Field';
        return "{$label} {$message}";
    }
}
