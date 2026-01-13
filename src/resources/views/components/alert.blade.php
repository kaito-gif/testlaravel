@props(['type' => 'info'])

@php
    $styles = [
        'success' => 'background: #d1fae5; border-left: 4px solid #10b981; color: #065f46;',
        'error' => 'background: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b;',
        'warning' => 'background: #fef3c7; border-left: 4px solid #f59e0b; color: #92400e;',
        'info' => 'background: #dbeafe; border-left: 4px solid #3b82f6; color: #1e40af;',
    ];
    $icons = [
        'success' => '✅',
        'error' => '❌',
        'warning' => '⚠️',
        'info' => 'ℹ️',
    ];
    $alertStyle = $styles[$type] ?? $styles['info'];
    $icon = $icons[$type] ?? $icons['info'];
@endphp

<div style="padding: 16px; margin-bottom: 16px; {{ $alertStyle }}">
    <span style="font-size: 1.2em; margin-right: 8px;">{{ $icon }}</span>
    <span>{{ $slot }}</span>
</div>