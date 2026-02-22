<?php

class Validator
{
    public static function string($value, int $min = 1, ?int $max = null, string $field = ''): ?string
    {

        // Trim and check if empty string
        if ($error = self::emptyString($value, $field)) {
            return $error;
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

        // Trim and check if empty string
        if ($error = self::emptyString($value, $field)) {
            return $error;
        }

        // Email format validation
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return self::formatError($field, 'must be a valid email address.');
        }

        return null; // Valid

    }

    // Checks if a value is present and not just whitespace, returns error message if invalid
    private static function emptyString(mixed $value, string $field): ?string
    {
        $value = trim((string) $value);
        return $value === ''
            ? self::formatError($field, 'is required.')
            : null;
    }

    // Helper for consistent error messages
    private static function formatError(string $field, string $message): string
    {
        $label = $field ? ucfirst(trim($field)) : 'Field';
        return "{$label} {$message}";
    }
}
