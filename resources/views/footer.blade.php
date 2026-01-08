<footer class="text-center py-4 bg-light mt-5">
    <p class="mb-1">{{ config('footer.text') }}</p>

    <small>
        © {{ date('Y') }}
        <a href="{{ config('footer.url') }}">
            {{ config('footer.company') }}
        </a>
    </small>
</footer>
