
<h5>QR CODE</h5>
<p>QR Code ini merupakan milik</p>
@if($status==2)
<img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('detail.cetakqr',[$detail_aset_tis->no_seri]))) !!}">
@else
<img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('detail.cetakqr',[$detail_aset_lain->no_seri]))) !!}">
@endif