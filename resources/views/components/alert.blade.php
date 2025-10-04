@if (session('success'))
    <div style="padding: 15px; margin-bottom: 20px; border: 1px solid #d4edda; border-radius: 4px; color: #155724; background-color: #d4edda;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="padding: 15px; margin-bottom: 20px; border: 1px solid #f8d7da; border-radius: 4px; color: #721c24; background-color: #f8d7da;">
        {{ session('error') }}
    </div>
@endif