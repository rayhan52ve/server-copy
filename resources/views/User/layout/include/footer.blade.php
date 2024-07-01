<footer class="footer">
    @php
        $footer = \App\Models\FooterDetail::first();
    @endphp
    {{ @$footer->details }}
</footer>
