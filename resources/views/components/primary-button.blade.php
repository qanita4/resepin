<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center bg-resepin-tomato text-white font-semibold uppercase tracking-wide px-4 py-2 rounded-lg shadow-md shadow-resepin-tomato/30 transition duration-200 ease-in-out hover:brightness-95 focus:outline-none focus:ring-2 focus:ring-resepin-tomato/40 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
