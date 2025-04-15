<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tbody>
        @foreach($settings as $setting)

            <tr href="/admin/settings/{{ $setting->id }}" class="btn-form">
                <td><b>{{ $setting->name }}</b></td>
                <td><b>{{ $setting->title }}</b></td>
                <td><b>{{ $setting->value }}</b></td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>