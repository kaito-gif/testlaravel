@props(['title', 'footer' => null])

<div style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <h3 style="font-size: 1.5em; font-weight: bold; margin-bottom: 15px; color: #333;">
        {{ $title }}
    </h3>

    <div style="color: #666; line-height: 1.6;">
        {{ $slot }}
    </div>

    @if ($footer)
        <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
            {{ $footer }}
        </div>
    @endif
</div>