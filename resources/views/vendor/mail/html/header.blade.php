@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://harzo.hu/wp-content/uploads/2022/10/HARZO_uj_logo-1024x835.png" alt="Harzo Kft. logo"
                    style="width: 100px; height: 100px;">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
