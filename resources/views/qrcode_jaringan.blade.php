
<h5>QR CODE</h5>
<p>QR Code ini merupakan milik</p>

<img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('detailjaringan.cetakqr',[$detail_pengecekan_jaringan->no_seri]))) !!}">

