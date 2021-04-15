
<h5>QR CODE</h5>
<p>QR Code ini merupakan milik</p>

<table align="center" border="1">
    <thead>
        <tr>
            <th>No seri</th>
            <th>QR Code</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_cetak_all as $cetak)
        @if($cetak["status"] == "2")
        <tr>
            <td>{{ $cetak['no_seri'] }}</td>
            <td>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('detail.cetakqr',[$cetak['no_seri']]))) !!}">
            </td>
        </tr>
        @else
        <tr>
            <td>{{ $cetak['no_seri'] }}</td>
            <td>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('detail.cetakqr',[$cetak['no_seri']]))) !!}">
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>