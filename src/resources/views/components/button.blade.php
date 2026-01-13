@props(['type' => 'primary'])

@php
    $styles = [
        'primary' => 'background: #3b82f6; color: white;',
        'secondary' => 'background: #6b7280; color: white;',
        'danger' => 'background: #ef4444; color: white;',
        'success' => 'background: #10b981; color: white;',
    ];
    $buttonStyle = $styles[$type] ?? $styles['primary'];
@endphp

<button style="padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer; {{ $buttonStyle }}">
    {{ $slot }}
</button>