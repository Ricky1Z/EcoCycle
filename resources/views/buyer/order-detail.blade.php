@extends('layout.master')

@section('konten')feafea
    <div class="p-4">
        <div class="block m-auto w-full max-w-[1200px] px-4">
            <h2 class="font-bold text-[50px] text-[#3C552D] mb-10">Order Details</h2>
            <div class="border-b border-[#3C552D] pb-6 mb-6">
                <div class="flex justify-between border-b-2 pb-2 mb-2">
                    <div class="">
                        <p class="font-medium">{{ $t->created_at->format('M d, Y H:i:s') }}</p>
                        <p>Order number {{ $t->id }}</p>
                    </div>
                    <div class="flex justify-end">
                        <p class="text-green-600">{{ $t->status }}</p>
                    </div>
                </div>
                <div class="px-4">
                    @php
                        $shownSellers = [];
                    @endphp
                    @foreach ($t->details as $detail)
                        @if (!in_array($detail->product->seller->id, $shownSellers))
                            @php
                                $shownSellers[] = $detail->product->seller->id;
                            @endphp
                            <div class="flex gap-2 items-center mt-4">
                                <img class="w-16 h-16 rounded-full" src="{{ asset('asset/profile.webp') }}"
                                    alt="profile" />
                                <div>
                                    <p class="font-medium">{{ $detail->product->seller->name }}</p>
                                    <p>{{ $detail->product->seller->region }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex gap-6 items-center">
                                <img class="w-20 h-20"
                                    src="data:image/jpeg;base64,{{ base64_encode($detail->product->image) }}"
                                    alt="product" />
                                <p>{{ $detail->product->name }}</p>
                            </div>
                            <div class="flex gap-16 font-medium">
                                <p>Quantity: {{ $detail->quantity }}</p>
                                <p>IDR:
                                    {{ number_format($detail->product->price * $detail->quantity, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="flex justify-end mt-4">
                        <p>Total {{ $t->details->sum('quantity') }} products: <span class="font-semibold">IDR
                                {{ number_format($t->total_price, 0, ',', '.') }}</span></p>
                    </div>
                </div>
            </div>
            <div class="flex mt-10 gap-5 items-center">
                <p class="text-2xl font-bold">Shipping Address</p>
            </div>
            <div class="mt-4">
                <p>{{ $t->buyer->name }}</p>
                <p>{{ $t->buyer->phone }}</p>
                <p>{{ $t->address->street }}</p>
                <p>{{ $t->address->subdistrict }}, {{ $t->address->city }},
                    {{ $t->address->province }}</p>
                <p>{{ $t->address->postal_code }}</p>
            </div>
            <div class="mt-10">
                <p class="text-2xl font-bold">Payment Information</p>
            </div>
            <div class="mt-10">
                <p class="text-2xl font-bold">Order Summary</p>
                <div class="font-semibold mt-4">
                    <div class="flex justify-between">
                        <p>Subtotal ({{ $t->details->count() }} item)</p>
                        <p>IDR {{ number_format($t->total_price, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p>Shipping Fee</p>
                        <p>IDR {{ number_format($t->shipping_fee, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-10 text-2xl font-bold flex justify-between">
                <p>Grand Total</p>
                <p>IDR {{ number_format($t->grand_total, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
