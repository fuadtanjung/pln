
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

        <tr>
            <td>{{ $cetak['no_seri'] }}</td>
            <td>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('detailjaringan.cetakqr',[$cetak['no_seri']]))) !!}">
            </td>
        </tr>



        @endforeach
    </tbody>
</table>