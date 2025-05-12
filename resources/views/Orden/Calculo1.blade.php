<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embarque</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .bg-pink {
            background-color: #FF8B8B;
        }

        .bg-orange {
            background-color: #FF9933;
        }

        .bg-blue {
           background-color: #031633;
        }
        .bg-yellow{
            background-color: #FFFF00;
        }
        .bg-green {
            background-color: #00B074;
        }
        .sidebar {
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            padding-top: 1rem;
            border-right: 1px solid #dee2e6;
            width: 250px;
        }
        .sidebar h4 {
            font-weight: bold;
            font-size: 1.5rem;
            color: #333333;
            text-align: center;
        }
        .sidebar p {
            color: #6c757d;
            text-align: center;
            font-size: 0.9rem;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }
        .sidebar a {
            color: #495057;
            text-decoration: none;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            border-radius: 0.5rem;
        }
        .sidebar a.active {
            background-color: #e9f7ef;
            color: #28a745;
            font-weight: bold;
        }
        .sidebar a:hover {
            background-color: #e9ecef;
            color: #28a745;
        }
        .sidebar a i {
            font-size: 1.2rem;
            margin-right: 1rem;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 0.5rem 1rem;
            position: fixed;
            width: calc(100% - 250px);
            left: 250px;
            top: 0;
            z-index: 1000;
        }
        .navbar .search-input {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 0.5rem;
            width: 300px;
        }
        .navbar .icons {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .navbar .icons i {
            font-size: 1.2rem;
            color: #6c757d;
            cursor: pointer;
        }
        .navbar .icons i:hover {
            color: #28a745;
        }
        .navbar .profile {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .navbar .profile img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .accordion-button:not(.collapsed) {
            background-color: #031633 !important;
            color: white;
        }

        .bg-warning {
            background-color: #FFFF00 !important;
        }

        .bg-danger {
            background-color: #FF0000 !important;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" style="display: none;">
            <h4>Sedap</h4>
            <p>Modern Admin Dashboard</p>
            <a href="#" class="active"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="#"><i class="bi bi-list"></i> Order List</a>
            <a href="#"><i class="bi bi-file-earmark-text"></i> Order Detail</a>
            <a href="#"><i class="bi bi-person"></i> Customer</a>
            <a href="#"><i class="bi bi-bar-chart"></i> Analytics</a>
            <a href="#"><i class="bi bi-chat-square-text"></i> Reviews</a>
            <a href="#"><i class="bi bi-basket"></i> Foods</a>
            <a href="#"><i class="bi bi-info-circle"></i> Food Detail</a>
            <a href="#"><i class="bi bi-people"></i> Customer Detail</a>
            <a href="#"><i class="bi bi-calendar"></i> Calendar</a>
            <a href="#"><i class="bi bi-chat"></i> Chat</a>
            <a href="#"><i class="bi bi-wallet2"></i> Wallet</a>
        </div>

        <!-- Main Content Placeholder -->
        <div class="flex-grow-1" >
            <!-- Navbar -->
            <div class="navbar d-flex justify-content-between align-items-center" style="display: none !important;">
                <input type="text" class="search-input" placeholder="Search here">
                <div class="icons">
                    <i class="bi bi-bell"></i>
                    <i class="bi bi-chat"></i>
                    <i class="bi bi-basket"></i>
                    <i class="bi bi-gear"></i>
                </div>
                <div class="profile">
                    <span>Hello, Samantha</span>
                </div>
            </div>
        <div class="container col-8 mt-4 py-5">
        <div class="card rounded-4 border-0">
            <div class="card-body">
                <h2 class="text-center">Formulario de Cotización</h2>
            </div>
        </div>
        <form class="mt-3" id="formEmbarque">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item pt-4">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                        TERMS AND CONDITIONS
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" >
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">MERCHANDISE VALUE, ExWorks</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-end" id="merchandiseValue" value="47,248.06" oninput="limpiar()">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="merchandiseValueMoneda" value="USD">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="incoterm" class="form-label">INCOTERM</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control text-center" id="incoterm" value="DDP-TALARA">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Vendor PO Pocesing</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center sum-CD venPPo" id="" value="" oninput="sumarCD()">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Delivery ExWorks</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center sum-CD DeliveryET" value="" readonly="readonly">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center DeliveryE" value="1" readonly="readonly">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Pick-up</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center sum-CD pickup" id="" value=""  oninput="sumarCD()">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Transit Time (DTD)</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center sum-CD transitTime" id="" value=""  oninput="sumarCD()">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label ">Custom Clearance</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center sum-CD custclea" id="" value=""  oninput="sumarCD()">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label text-center">TIME LINE</label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Local inspection and Repacking</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center sum-CD timeline" id="" value="" oninput="sumarCD()">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Delivery to customer</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center sum-CD deltocust" id="" value="" oninput="sumarCD()">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Service compliance</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center servcompl" id="" value="">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3 text-white bg-danger p-2">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Customer Delivery</label>
                                </div>
                                <div class="col-md-3 text-center">
                                    <label for="pieces" class="form-label" id="customerDeliveryTotal"></label>
                                </div>
                                <div class="col-md-3 text-center">
                                    <label for="pieces" class="form-label" id="customerDeliveryTotalIGV"></label>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Payment to Vendor</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control text-center" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="pieces" class="form-label"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="pieces" class="form-label">Customer Payment</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control text-center customerPayment" id="" value="">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="portOrigin" class="form-label">Port of Origin</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="portOrigin" value="Houston, TX - USA">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="portDestination" class="form-label">Port of Destination</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="portDestination" value="Callao, PE">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="deliveryLocation" class="form-label">Delivery Location</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="deliveryLocation" value="Talara, PE">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pieces" class="form-label">Number de pieces / Items</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control text-center" id="" value="0" readonly="readonly">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control text-center itemsV" id="" value="31" readonly="readonly">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pieces" class="form-label">Weight</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="pieces" class="form-label">Net, lb</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control text-center weightNLB" id="" value="1045.630" readonly="readonly">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pieces" class="form-label">Weight</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="pieces" class="form-label">Net, kg</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control text-center weightNKG" id="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pieces" class="form-label">Weight</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="pieces" class="form-label">Bruto, lb</label>
                                </div>
                                <div class="col-md-3">
                                <input type="number" class="form-control text-center weightBL" id="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pieces" class="form-label">Weight</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="pieces" class="form-label">Bruto, kg</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control text-center weightBKT" id="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pieces" class="form-label">Weight/Volume</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="pieces" class="form-label">lb-ft³</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control text-center wvklbft3" value="1015.518" oninput="calcularggplus()" readonly="readonly">
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pieces" class="form-label">Weight/Volume</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="pieces" class="form-label">kg-m³</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control text-center wvkgm3" id="" value="552.493" oninput="calcularTrtoCukg()" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item pt-4">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                        EXPENSES IN ORIGEN
                    </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" >
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Shipper Packing and Handling</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_1_1" value="Quote" disabled="disabled">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-input limpiarinp spahan" id="incoterm_1_2" value="" oninput="CalcularIGVEIO(this,'shpandhanIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-inputIGV limpiarinp shpandhanIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Pick Uo via Truck, per kilogram</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1  text-center" id="incoterm_2_1" value="" oninput="sumarExInOr(this,'piuvtrpkil','piuvtrpkilIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2  text-end sum-input limpiarinp piuvtrpkil" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3  text-end sum-inputIGV limpiarinp piuvtrpkilIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Terminal Handling -Forwarding, per shipment</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1  text-center" id="incoterm_3_1" oninput="sumarExInOr(this,'terhanfopsh','terhanfopshIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2  text-end sum-input limpiarinp terhanfopsh" id="" value="" oninput="CalcularIGVEIO(this,'terhanfopshIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3  text-end sum-inputIGV limpiarinp terhanfopshIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Administrative Handling, per kilogram</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1  text-center" id="incoterm_4_1" oninput="sumarExInOr(this,'adhanpkil','adhanpkilIGV')">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2  text-end sum-input limpiarinp adhanpkil" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3  text-end sum-inputIGV limpiarinp adhanpkilIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Export Custom Clearence, per shipment</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1  text-center" id="incoterm_5_1" oninput="sumarExInOr(this,'excuclpesh','excuclpeshIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-input limpiarinp excuclpesh" id="" value="" oninput="CalcularIGVEIO(this,'excuclpeshIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-inputIGV limpiarinp excuclpeshIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Export Custom Clearence - Add Items, $/item</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_6_1" oninput="sumarExInOr(this,'expoCusCladItem','expoCusCladItemIGV')">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-input limpiarinp expoCusCladItem" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-inputIGV limpiarinp expoCusCladItemIGV" id="" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="row p-2 bg-pink fw-bold mx-0">
                            <div class="col-md-8">
                                <label for="merchandiseValue" class="form-label">Sub total Expenses in Origen</label>
                            </div>
                            <div class="col-md-2 text-end">
                                <label for="merchandiseValue" class="form-label limpiarlbl" id="SubtotalExpensesinOrigen"></label>
                            </div>
                            <div class="col-md-2 text-end">
                                <label for="merchandiseValue" class="form-label limpiarlbl" id="SubtotalExpensesinOrigenIGV">-</label>
                            </div>
                    </div>
                    <div class="row p-2 bg-orange fw-bold text-white mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">FCA/FAS VALUE</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="fcafasvalue"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="fcafasvalueIGV">-</label>
                        </div>
                    </div>
                </div>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" >
                    <div class="accordion-body bg-white">
                        <div class="row p-2">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Door To Door Service</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_7_1" value="Quote" disabled="disabled">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_7_2" value=""  oninput="CalcularIGVEIO2(this,'dotodoseIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp dotodoseIGV" id="" value=""  readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Freight, per kilogram</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_8_1" oninput="sumarExInOr2(this,'freperkilI','freperkilIGV')">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp freperkilI" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp freperkilIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Cargo screening Fee, per kilogram</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_9_1" oninput="sumarExInOr2(this,'cargsfperkilI','cargsfperkilIGV')">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp cargsfperkilI" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp cargsfperkilIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Mainleg Security Filing Fee, per shipment</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_17_1" oninput="sumarExInOr2(this,'maisecffpsh','maisecffpshIGV')">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp maisecffpsh" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp maisecffpshIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Transportation Charges (currier)</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_10_1" value="Quote" disabled="disabled">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_10_2" value="" oninput="CalcularIGVEIO2(this,'transChIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp transChIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Discount (currier)</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_11_1" value="Quote" disabled="disabled">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_11_2" value="" oninput="CalcularIGVEIO2(this,'discCuIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp discCuIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Shipment Protection, per 110% FCA/FAS</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_12_1"  oninput="sumarExInOr2(this,'shipProPFCA','shipProPFCAIGV')">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp shipProPFCA" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp shipProPFCAIGV" id="incoterm_12_3" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">GoGreen Plus</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_14_1" value="Quote" disabled="disabled">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 sum-CostEIO text-end limpiarinp gogreenPlI" id="" value="" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp gogreenPlIGV" id="" value="" readonly>
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Demand Surcharge (currier)</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_15_1" value="Quote" disabled="disabled">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_15_2" value="" oninput="CalcularIGVEIO2(this,'demanSurCIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp demanSurCIGV" id="" value="" >
                                </div>
                            </div>
                            <hr class="border opacity-75">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="merchandiseValue" class="form-label">Fuel Surcharge, (currier)</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-1 text-center" id="incoterm_16_1" value="Quote" disabled="disabled">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_16_2" value="" oninput="CalcularIGVEIO2(this,'fulSurCuIGV');">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-data-3 text-end sum-CostEIOIGV limpiarinp fulSurCuIGV" id="" value="" >
                                </div>
                            </div>
                        </div>
                </div>
                <div class="accordion-item">
                    <div class="row p-2 bg-pink fw-bold mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">Sub total Expenses in Origen</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalExpensesinOrigen2"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalExpensesinOrigen2IGV">-</label>
                        </div>
                    </div>
                    <div class="row p-2 bg-orange fw-bold text-white mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">CIF VALUE</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="CifValue2"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="CifValue2IGV">-</label>
                        </div>
                    </div>
                    <div class="row p-2 bg-warning fw-bold text-danger mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">CIF Factor</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="CifFactor2"></label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item pt-4">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        EXPENSES AT DESTINATION
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" >
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Dest. Administrative Handling, per shipment</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="" value="" oninput="CalcularExAD(this,'dahpsh','dahpshIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD limpiarinp dahpsh" id="" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV limpiarinp dahpshIGV" id="" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Charges Collect Fee, % Origen+Freight</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="" value="" oninput="CalcularExAD(this,'ccfof','ccfofIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD limpiarinp ccfof" id="" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV limpiarinp ccfofIGV" id="" value="" oninput="sumarCostEADIGV();">
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Transport to COPE, per kilogram</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="" value="" oninput="CalcularExAD(this,'ttcpki','ttcpkiIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD limpiarinp ttcpki" id="" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV limpiarinp ttcpkiIGV" id="" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Transport to Customer, US$/kg</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="" value="Quote" disabled="disabled">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD limpiarinp trtoCukg" id="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV limpiarinp trtoCukgIGV" id="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row bg-pink p-2">
                            <div class="col-md-8">
                                <label for="merchandiseValue" class="form-label">Sub total Expenses in Origen</label>
                            </div>
                            <div class="col-md-2 text-end">
                                <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalExpensesatDestination"></label>
                            </div>
                            <div class="col-md-2 text-end">
                                <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalExpensesatDestinationIGV"></label>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Custom Clearance Fee, 0.5% CIF - Min 150</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="incoterm_35_1" value="" oninput="CalcularExAD2(this,'cclfcmi','cclfcmiIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD2 limpiarinp cclfcmi" id="incoterm_35_2" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV2 limpiarinp cclfcmiIGV" id="incoterm1" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Custom  Clearance-Additional Lines, per line</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="incoterm_32_1" value="" oninput="CalcularExAD2(this,'cclalpl','cclalplIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD2 limpiarinp cclalpl" id="incoterm_32_2" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV2 limpiarinp cclalplIGV" id="incoterm1" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Operatives Expenses, per shipmet</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="incoterm_18_1" value="" oninput="CalcularExAD2(this,'oexpsh','oexpshIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2  text-end sum-CostEAD2 limpiarinp oexpsh" id="incoterm_18_2" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2  text-end sum-CostEADIGV2 limpiarinp oexpshIGV" id="incoterm2" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Administrative Expenses , US$</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="incoterm_19_1" value="Quote" disabled="disabled">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD2 limpiarinp" id="incoterm_19_2" value="" oninput="CalcularExAD2(this,'aeusIGV','aeusIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV2 limpiarinp aeusIGV" id="incoterm3" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Inspection/Aforo Fisico, US$</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control limpiarinp" id="incoterm_21_1" value="Quote" disabled="disabled">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control text-end sum-CostEAD2 limpiarinp" id="incoterm_21_2" value="" oninput="CalcularExAD2(this,'insafusIGV','insafusIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control text-end sum-CostEADIGV2 limpiarinp insafusIGV" id="incoterm5" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Storage, Talma Shohim</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 limpiarinp" id="incoterm_23_1" value="Quote" disabled="disabled">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostEAD2 limpiarinp" id="incoterm_23_2" value="" oninput="CalcularExAD2(this,'stTSIGV','stTSIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostEADIGV2 limpiarinp stTSIGV" id="incoterm7" value="" readonly>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="row p-2 bg-pink fw-bold mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">Sub total Expenses at destination</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalExpensesatDestination2"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalExpensesatDestinationIGV2"></label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item pt-4">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        IMPORT TAXES
                    </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" >
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Ad Valorem</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 text-end limpiarinp" id="incoterm_28_1" value="" oninput="CalcularITAX(this,'adval','advalIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostITAX limpiarinp adval" id="AdValorem" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostITAXIGV limpiarinp advalIGV" id="incoterm_28_3" value=""  oninput="sumarITAXIGV()">
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Surcharge</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 text-end limpiarinp" id="incoterm_29_1" value="" >
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostITAX limpiarinp" id="incoterm_29_2" value="" oninput="sumarITAX()">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostITAXIGV limpiarinp" id="incoterm_29_3" value="" oninput="sumarITAXIGV()">
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">IGV, 16% (CIF+AV)</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 text-end limpiarinp" id="incoterm_30_1" value="" oninput="CalcularITAX(this,'igvcifav','igvcifavIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostITAX limpiarinp igvcifav" id="incoterm_30_2" value="" oninput="sumarITAX()">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostITAXIGV limpiarinp igvcifavIGV" id="incoterm_30_3" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">IPM, 2% (CIF+AV)</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1  text-end limpiarinp" id="incoterm_31_1" value="" oninput="CalcularITAX(this,'ipmcifav','ipmcifavIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2  text-end sum-CostITAX limpiarinp ipmcifav" id="incoterm_31_2" value="" oninput="sumarITAX()">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostITAXIGV limpiarinp ipmcifavIGV" id="incoterm_31_3" value="" readonly>
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Perception, 3.5 (CIF+AV+IGV+IPM)</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1 text-end limpiarinp" id="incoterm_31_1" value="" oninput="CalcularITAX(this,'pcifavigip','pcifavigipIGV')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-CostITAX limpiarinp pcifavigip" id="incoterm_31_2" value="" oninput="sumarITAX()">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end sum-CostITAXIGV limpiarinp pcifavigipIGV" id="incoterm_31_3" value="" readonly>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="row p-2 bg-pink fw-bold mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">Sub Total Import Taxes</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalImportTaxes"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="SubTotalImportTaxesIGV"></label>
                        </div>
                    </div>
                    <div class="row p-2 bg-orange fw-bold mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">TOTAL IMPORT EXPENSES</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalImportExpenses"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalImportExpensesIGV"></label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item pt-4">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        FIN EXP
                    </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" >
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Intereses Financieros</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1  text-end limpiarinp intFin" id="incoterm_32_1" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-FinExp limpiarinp intFinv" id="incoterm_32_2" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end limpiarinp" id="incoterm_32_3" value="">
                            </div>
                        </div>
                        <hr class="border opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="merchandiseValue" class="form-label">Gastos de transferencia</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-1  text-end limpiarinp " id="incoterm_32_1" value="">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-2 text-end sum-FinExp limpiarinp gastra" id="incoterm_32_2" value="" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-data-3 text-end limpiarinp" id="incoterm_32_3" value="">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="row p-2 bg-pink fw-bold mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">Total Financial Expenses</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalFinancialExpenses"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl"></label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="row p-2 bg-danger fw-bold text-white mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">TOTAL COSTO FOR COPE</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalCostoForCope"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalCostoForCopeIGV"></label>
                        </div>
                    </div>
                    <div class="row p-2 bg-danger fw-bold text-white mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">Import Factor for COPE</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="ImportFactorforCope"></label>
                        </div>
                    </div>
                    <div class="row p-2 fw-bold mx-0">
                        <div class="col-md-6">
                            <label for="merchandiseValue" class="form-label">Administrative Expenses, %</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp" id="" value="" oninput="CalcularSubtotal(this,'adminExp')">
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp adminExp" id="" value="" readonly>
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp" id="" value="">
                        </div>
                    </div>
                    <div class="row p-2 fw-bold mx-0">
                        <div class="col-md-6">
                            <label for="merchandiseValue" class="form-label">Operative Margin</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp" id="" value="" oninput="CalcularSubtotal(this,'operMarg')">
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp operMarg sum-Subtotal" id="" value="" readonly>
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp" id="" value="">
                        </div>
                    </div>
                    <div class="row p-2 fw-bold mx-0">
                        <div class="col-md-6">
                            <label for="merchandiseValue" class="form-label">Contingencies, %</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp" id="" value="" oninput="CalcularSubtotal(this,'contigencias')">
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp contigencias sum-Subtotal" id="" value="" readonly>
                        </div>
                        <div class="col-md-2 text-center">
                            <input type="text" class="form-control text-end limpiarinp" id="" value="">
                        </div>
                    </div>
                    <div class="row p-2 bg-pink fw-bold mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">Sub Total</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalSubtotal"></label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalSubtotalIGV"></label>
                        </div>
                    </div>
                    <div class="row p-2 fw-bold mx-0">
                        <div class="col-md-6">
                            <label for="merchandiseValue" class="form-label">SALE COST</label>
                        </div>
                        <div class="col-md-3 text-center">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalSaleCost"></label>
                        </div>
                        <div class="col-md-3 text-center">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalSaleCostIGV"></label>
                        </div>
                    </div>

                    <div class="row p-2 bg-warning fw-bold mx-0">
                        <div class="col-md-8 text-black">
                            <label for="merchandiseValue" class="form-label">SALES FACTOR</label>
                        </div>
                        <div class="col-md-4 text-center text-danger">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="SalesFactorTotal"></label>
                        </div>
                    </div>


                    <div class="row p-2 w-bold text-blue mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">MARK UP</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label" id="MarkUp">9449.61</label>
                        </div>
                        <div class="col-md-2 text-start">
                            <label for="merchandiseValue" class="form-label">USD</label>
                        </div>
                    </div>
                    <div class="row p-2 w-bold text-blue mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">TOTAL SALES PRICE</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label" id="TotalSalesPrice"></label>
                        </div>
                        <div class="col-md-2 text-start">
                            <label for="merchandiseValue" class="form-label">USD</label>
                        </div>
                    </div>
                    <div class="row p-2 w-bold text-blue mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">GROSS PROFIT</label>
                        </div>
                        <div class="col-md-2 text-end">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="GrossProfit"></label>
                        </div>
                        <div class="col-md-2 text-start">
                            <label for="merchandiseValue" class="form-label">USD</label>
                        </div>
                    </div>
                    <div class="row p-2 w-bold text-blue mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">MARGING AGAINST SALE</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="MargingAgainstSale"></label>
                        </div>
                    </div>
                    <div class="row p-2 w-bold text-blue mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">MARGING AGAINST COST</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="MargingAgainstCost"></label>
                        </div>
                    </div>
                    <div class="row p-2 w-bold text-blue mx-0">
                        <div class="col-md-8">
                            <label for="merchandiseValue" class="form-label">-</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="merchandiseValue" class="form-label limpiarlbl" id="TotalEmba"></label>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Submit Button -->
            <div class="d-grid gap-2 col-2 mx-auto mt-3">
                <button type="button" class="btn btn-success bg-green p-3 fw-bold border-0">Guardar</button>
            </div>
        </form>
    </div>
        </div>
    </div>

    <!-- Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        function CalcularDelivery() {

            const DeliveryE = document.getElementsByClassName('DeliveryE')[0];
            const DeliveryET = DeliveryE.value.trim() === "" ? 0 : parseFloat(DeliveryE.value);
            let total = 0;

            total = 7 * DeliveryET;

            document.getElementsByClassName('DeliveryET')[0].value = total;

            sumarCD();
        }

        function calcularggplus(){
            const wvklbft3 = document.getElementsByClassName('wvklbft3')[0];
            const wvklbft3T = wvklbft3.value.trim() === "" ? 0 : parseFloat(wvklbft3.value);
            let total = 0;

            total = 29.95 / 760 * wvklbft3T;

            document.getElementsByClassName('gogreenPlI')[0].value = total.toFixed(2);

            let total2 = 0;
            total2 = 0.18 * total;

            document.getElementsByClassName('gogreenPlIGV')[0].value = total2.toFixed(2);
        }


        function calcularTrtoCukg(){
            let total = 0;

            const stro = document.getElementsByClassName('weightBKT')[0];
            let brtlb = stro.value.trim() === "" ? 0 : parseFloat(stro.value.replace(/,/g, '')) || 0;

            const stro2 = document.getElementsByClassName('wvkgm3')[0];
            let wvkgm3 = stro2.value.trim() === "" ? 0 : parseFloat(stro2.value.replace(/,/g, '')) || 0;

            if (wvkgm3 > brtlb ){
                total = (wvkgm3*2+60)/3.7;
            }else{
                total = (brtlb*2+60)/3.7;
            }

            document.getElementsByClassName('trtoCukg')[0].value = total.toFixed(2);

            let total2 = 0;
            total2 = 0.18 * total;

            document.getElementsByClassName('trtoCukgIGV')[0].value = total2.toFixed(2);
        }

        function calcularInFin(){
            let total = 0;
            let total3 = 0;

            total = (0.015/30)*100;

            document.getElementsByClassName('intFin')[0].value = total.toFixed(2);
 
            total3 = 64+42+12;

            document.getElementsByClassName('gastra')[0].value = total3.toFixed(2);  
            
        }


        function calcularFinExp(){

            let total2 = 0;

            const totalv = document.getElementsByClassName('intFin')[0];
            let total = totalv.value.trim() === "" ? 0 : parseFloat(totalv.value.replace(/,/g, '')) || 0;

            console.log('Total: -------------------');
            console.log('--- '+total);

            const valorMer = document.getElementById('merchandiseValue').value.replace(/,/g, '');

            console.log('D67: -------------------');
            console.log('--- '+valorMer);

            const E5 = document.getElementsByClassName('venPPo')[0];
            let E5T = E5.value.trim() === "" ? 0 : parseFloat(E5.value.replace(/,/g, '')) || 0;

            console.log('E5: -------------------');
            console.log('--- '+E5T);

            const E6 = document.getElementsByClassName('DeliveryET')[0];
            let E6T = E6.value.trim() === "" ? 0 : parseFloat(E6.value.replace(/,/g, '')) || 0;

            console.log('E6T: -------------------');
            console.log('--- '+E6T);

            const E7 = document.getElementsByClassName('pickup')[0];
            let E7T = E7.value.trim() === "" ? 0 : parseFloat(E7.value.replace(/,/g, '')) || 0;

            console.log('E7T: -------------------');
            console.log('--- '+E7T);

            const E8 = document.getElementsByClassName('transitTime')[0];
            let E8T = E8.value.trim() === "" ? 0 : parseFloat(E8.value.replace(/,/g, '')) || 0;

            console.log('E8T: -------------------');
            console.log('--- '+E8T);

            const E9 = document.getElementsByClassName('custclea')[0];
            let E9T = E9.value.trim() === "" ? 0 : parseFloat(E9.value.replace(/,/g, '')) || 0;

            console.log('E9T: -------------------');
            console.log('--- '+E9T);

            const E10 = document.getElementsByClassName('timeline')[0];
            let E10T = E10.value.trim() === "" ? 0 : parseFloat(E10.value.replace(/,/g, '')) || 0;

            console.log('E10T: -------------------');
            console.log('--- '+E10T);

            const E11 = document.getElementsByClassName('deltocust')[0];
            let E11T = E11.value.trim() === "" ? 0 : parseFloat(E11.value.replace(/,/g, '')) || 0;

            console.log('E11T: -------------------');
            console.log('--- '+E11T);

            const E12 = document.getElementsByClassName('servcompl')[0];
            let E12T = E12.value.trim() === "" ? 0 : parseFloat(E12.value.replace(/,/g, '')) || 0;

            console.log('E12T: -------------------');
            console.log('--- '+E12T);

            const E15 = document.getElementsByClassName('customerPayment')[0];
            let E15T = E15.value.trim() === "" ? 0 : parseFloat(E15.value.replace(/,/g, '')) || 0;

            console.log('E15T: -------------------');
            console.log('--- '+E15T);
 
            const E66 = document.getElementById('TotalImportExpenses');
            let E66T = E66.innerText.trim() === "" ? 0 : parseFloat(E66.innerText.replace(/,/g, '')) || 0;

            console.log('E66T: -------------------');
            console.log('--- '+E66T);

            const F66 = document.getElementById('TotalImportExpensesIGV');
            let F66T = F66.innerText.trim() === "" ? 0 : parseFloat(F66.innerText.replace(/,/g, '')) || 0;

            console.log('F66T: -------------------');
            console.log('--- '+F66T);
           
            total2 = (total/100)*valorMer*0*(E5T+E6T+E7T+E8T+E9T+E10T+E11T+E12T+E15T)+(total/100)*valorMer*1*+(E8T+E9T+E10T+E11T+E12T+E15T)+(total/100)*E66T*(E8T+E9T+E10T+E11T+E12T+E15T)+(total/100)*F66T*(E9T+E10T+E11T+E12T+E15T);

            console.log('suma1: -------------------');
            const suma1 = (E5T+E6T+E7T+E8T+E9T+E10T+E11T+E12T+E15T);
            console.log('--- '+suma1);


            console.log('suma2 + suma 3: -------------------');
            const suma2 = (E8T+E9T+E10T+E11T+E12T+E15T);
            console.log('--- '+suma2);


            console.log('suma 4: -------------------');
            const suma3 = (E9T+E10T+E11T+E12T+E15T);
            console.log('--- '+suma3);

            document.getElementsByClassName('intFinv')[0].value = total2.toFixed(2);

            sumarFinExp();
        }
        
        function sumarCD() {
           
           const inputs = document.querySelectorAll('.sum-CD');
           
           let total = 0;

       
           inputs.forEach(input => {
               const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
               total += valor;
           });

           document.getElementById('customerDeliveryTotal').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

           let total2 = total / 7;
           total2 = Math.ceil(total2 * 20) / 20;

           document.getElementById('customerDeliveryTotalIGV').innerText = total2.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
           
       }

       function weightCalcular(){

        const weightNLB = document.getElementsByClassName('weightNLB')[0];
        const weightNLBT = weightNLB.value.trim() === "" ? 0 : parseFloat(weightNLB.value);
        let total = 0;
        let total2 = 0;
        let total3 = 0;

        total = parseFloat((weightNLBT / 2.2).toFixed(3));
        total2 = parseFloat((weightNLBT / 0.65).toFixed(3));
        total3 = ((weightNLBT / 0.65) / 2.2).toFixed(3);

        document.getElementsByClassName('weightNKG')[0].value = total;
        document.getElementsByClassName('weightBL')[0].value = total2;
        document.getElementsByClassName('weightBKT')[0].value = total3;
       }

       document.addEventListener("DOMContentLoaded", function() {
            CalcularDelivery();
            weightCalcular();
            calcularggplus();
            calcularTrtoCukg();
            calcularInFin();
        });
        

        function sumar() {
           
            const inputs = document.querySelectorAll('.sum-input');
            
            let total = 0;

        
            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

      
            total = Math.floor((total - 0.005) * 100) / 100;

            document.getElementById('SubtotalExpensesinOrigen').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            const valorMer = document.getElementById('merchandiseValue').value.replace(/,/g, '');

            let FacsValue = 0;

            if (total > 0){
                FacsValue = parseFloat(valorMer) + total;
            } else {
                FacsValue = 0;
            }

            document.getElementById('fcafasvalue').innerText = FacsValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function sumarEIOIGV() {

            const inputs = document.querySelectorAll('.sum-inputIGV');
            
            let total = 0;

      
            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('SubtotalExpensesinOrigenIGV').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            document.getElementById('fcafasvalueIGV').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            

            const SubTotalExpensesinOrigen2IGV = document.getElementById('SubTotalExpensesinOrigen2IGV');
            let SubTotalExpensesinOrigen2IGVT = SubTotalExpensesinOrigen2IGV.innerText.trim() === "" ? 0 : parseFloat(SubTotalExpensesinOrigen2IGV.innerText.replace(/,/g, '')) || 0;

            let FacsValue = 0;

            if (total > 0){
                FacsValue = parseFloat(SubTotalExpensesinOrigen2IGVT) + total;
            }else {
                FacsValue = 0;
            }

            document.getElementById('CifValue2IGV').innerText = FacsValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        } 

        function sumarCostEIO() {

            const inputs = document.querySelectorAll('.sum-CostEIO');
            
            let total = 0;

        
            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            total = Math.floor((total - 0.0005) * 1000) / 1000;

            total = Math.floor((total - 0.005) * 100) / 100;

            document.getElementById('SubTotalExpensesinOrigen2').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            const valorMer = document.getElementById('merchandiseValue').value.replace(/,/g, '');

            const stro = document.getElementById('SubtotalExpensesinOrigen');
            let valuestro = stro.innerText.trim() === "" ? 0 : parseFloat(stro.innerText.replace(/,/g, '')) || 0;

            const FacsValue = parseFloat(valorMer) + total + parseFloat(valuestro);

            let roundedValue = Math.round(FacsValue * 1000) / 1000;

            roundedValue = Math.round(roundedValue * 100) / 100;

            document.getElementById('CifValue2').innerText = roundedValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            const valorCifF = FacsValue / parseFloat(valorMer);
            
            document.getElementById('CifFactor2').innerText = valorCifF.toFixed(3);

        }

        function sumarCostEIOIGV() {

            const inputs = document.querySelectorAll('.sum-CostEIOIGV');
            
            let total = 0;

        
            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('SubTotalExpensesinOrigen2IGV').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            const fcafasvalueIGV = document.getElementById('fcafasvalueIGV');
            let fcafasvalueIGVT = fcafasvalueIGV.innerText.trim() === "" ? 0 : parseFloat(fcafasvalueIGV.innerText.replace(/,/g, '')) || 0;
            
            const FacsValue = parseFloat(fcafasvalueIGVT) + total;

            document.getElementById('CifValue2IGV').innerText = FacsValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        }

        function sumarExInOr2(val,inputD,inputI){

            let total = 0;
            const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;


            if (inputD == "freperkilI" || inputD == "cargsfperkilI"){

                const stro = document.getElementsByClassName('weightBKT')[0];
                let brtlb = stro.value.trim() === "" ? 0 : parseFloat(stro.value.replace(/,/g, '')) || 0;

                const stro2 = document.getElementsByClassName('wvkgm3')[0];
                let wvkgm3 = stro2.value.trim() === "" ? 0 : parseFloat(stro2.value.replace(/,/g, '')) || 0;

                if (brtlb > wvkgm3 ){
                    total = vl * brtlb;
                }else{
                    total = vl*wvkgm3;
                }

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                let totalIGV = total*0.18;

                document.getElementsByClassName(inputI)[0].value = totalIGV.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            } else if (inputD == "shipProPFCA") {

                const fcafasvalue =   document.getElementById('fcafasvalue');
                let fcafasvalueT = fcafasvalue.innerText.trim() === "" ? 0 : parseFloat(fcafasvalue.innerText.replace(/,/g, '')) || 0;

                const Fpki = document.getElementsByClassName('freperkilI')[0];
                let FpkiT = Fpki.value.trim() === "" ? 0 : parseFloat(Fpki.value.replace(/,/g, '')) || 0;

                const Csfpki = document.getElementsByClassName('cargsfperkilI')[0];
                let CsfpkiT = Csfpki.value.trim() === "" ? 0 : parseFloat(Csfpki.value.replace(/,/g, '')) || 0;

                const Msffpsh = document.getElementsByClassName('maisecffpsh')[0];
                let MsffpshT = Msffpsh.value.trim() === "" ? 0 : parseFloat(Msffpsh.value.replace(/,/g, '')) || 0;

                const Ggrpl = document.getElementsByClassName('gogreenPlI')[0];
                let GgrplT = Ggrpl.value.trim() === "" ? 0 : parseFloat(Ggrpl.value.replace(/,/g, '')) || 0;

                total = ((fcafasvalueT+FpkiT+CsfpkiT+MsffpshT+GgrplT) * 1.1 ) * vl;

                const resultado = (total / 100).toFixed(2);

                document.getElementsByClassName(inputD)[0].value = resultado.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                let totalIGV = resultado*0.18;

                document.getElementsByClassName(inputI)[0].value = totalIGV.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            
            }else{

                total = vl;

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                let totalIGV = total*0.18;

                document.getElementsByClassName(inputI)[0].value = totalIGV.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            sumarCostEIO();
            sumarCostEIOIGV();
        }

        function CalcularIGVEIO2(val,inputD) {
            let total2 = 0;
            const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;
            total2 = 0.18 * vl;

            document.getElementsByClassName(inputD)[0].value = total2.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            sumarCostEIO();
            sumarCostEIOIGV();
        }


        function sumarExInOr(val,inputD,inputI){

            let total = 0;
            const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;


            if (inputD == "piuvtrpkil" || inputD == "adhanpkil" ){

                const stro = document.getElementsByClassName('weightBKT')[0];
                let brtlb = stro.value.trim() === "" ? 0 : parseFloat(stro.value.replace(/,/g, '')) || 0;

                const stro2 = document.getElementsByClassName('wvkgm3')[0];
                let wvkgm3 = stro2.value.trim() === "" ? 0 : parseFloat(stro2.value.replace(/,/g, '')) || 0;

                if (brtlb > wvkgm3 ){
                    total = vl * brtlb;
                }else{
                    total = vl*wvkgm3;
                }

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                let totalIGV = total*0.18;

                document.getElementsByClassName(inputI)[0].value = totalIGV.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            
            } else if (inputD == "expoCusCladItem") {

                const stro = document.getElementsByClassName('itemsV')[0];
                let itemsV = stro.value.trim() === "" ? 0 : parseFloat(stro.value.replace(/,/g, '')) || 0;
            
                if (itemsV > 3){
                    total = (itemsV-3)*vl;
                }else {
                    total = 0;
                }

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                let totalIGV = total*0.18;

                document.getElementsByClassName(inputI)[0].value = totalIGV.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            }else{

                total = vl;

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                let totalIGV = total*0.18;

                document.getElementsByClassName(inputI)[0].value = totalIGV.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            }

            sumar();
            sumarEIOIGV();
        }

        function CalcularIGVEIO(val,inputD) {
            let total2 = 0;
            const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;
            total2 = 0.18 * vl;

            document.getElementsByClassName(inputD)[0].value = total2.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            sumar();
            sumarEIOIGV();
        }

        function CalcularITAX(val,inputD,inputIGV){
            let total = 0;
            let total2 = 0;

            

            if (inputD == 'adval'){
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;

                const spahan =   document.getElementById('merchandiseValue');
                let spahanT = spahan.value.trim() === "" ? 0 : parseFloat(spahan.value.replace(/,/g, '')) || 0;

                const cifvalue = document.getElementById('CifValue2');
                let cifvalueT = cifvalue.innerText.trim() === "" ? 0 : parseFloat(cifvalue.innerText.replace(/,/g, '')) || 0;


                if (spahanT < 2000){
                    total = (cifvalueT * vl/ 100);
                }else {
                    //reemplazar con el valor Worksheet!$X59
                    total = 918.94;
                }


                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                
            } else if ( inputD == 'pcifavigip') {
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;

                const cifvalue = document.getElementById('CifValue2');
                let cifvalueT = cifvalue.innerText.trim() === "" ? 0 : parseFloat(cifvalue.innerText.replace(/,/g, '')) || 0;

                const adval =   document.getElementsByClassName('adval')[0];
                let advalT = adval.value.trim() === "" ? 0 : parseFloat(adval.value.replace(/,/g, '')) || 0;

                const igvcifav =   document.getElementsByClassName('igvcifavIGV')[0];
                let igvcifavT = igvcifav.value.trim() === "" ? 0 : parseFloat(igvcifav.value.replace(/,/g, '')) || 0;

                const ipmcifav =   document.getElementsByClassName('ipmcifavIGV')[0];
                let ipmcifavT = ipmcifav.value.trim() === "" ? 0 : parseFloat(ipmcifav.value.replace(/,/g, '')) || 0;

                total = ((vl * (cifvalueT+advalT+igvcifavT+ipmcifavT))/ 100);

                document.getElementsByClassName(inputIGV)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            } else {
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;

                const adval = document.getElementsByClassName('adval')[0];
                let advalT  =  adval.value.trim() === "" ? 0 : parseFloat(adval.value.replace(/,/g, '')) || 0;

                const cifvalue = document.getElementById('CifValue2');
                let cifvalueT = cifvalue.innerText.trim() === "" ? 0 : parseFloat(cifvalue.innerText.replace(/,/g, '')) || 0;

                console.log('cifvalueT: '+ cifvalueT);
                console.log('---------------------');
                console.log('advalT: '+ advalT);
                console.log('---------------------');
                console.log('value: '+ vl);
                console.log('---------------------');

                total = ((vl * (cifvalueT+advalT))/ 100);

                console.log('total: '+ total);
                console.log('---------------------');

                document.getElementsByClassName(inputIGV)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            sumarITAX();
            sumarITAXIGV();
        }
        

        function CalcularExAD(val,inputD,inputIGV){

            let total = 0;
            let total2 = 0;

            if (inputD == 'dahpsh'){
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;
                total = 0.18 * vl;

                document.getElementsByClassName(inputD)[0].value = (val.value).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                document.getElementsByClassName(inputIGV)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }else if (inputD == 'ccfof'){
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;
                
                const spahan =   document.getElementsByClassName('spahan')[0];
                let spahanT = spahan.value.trim() === "" ? 0 : parseFloat(spahan.value.replace(/,/g, '')) || 0;

                const seior = document.getElementById('SubtotalExpensesinOrigen');
                let seiorT = seior.innerText.trim() === "" ? 0 : parseFloat(seior.innerText.replace(/,/g, '')) || 0;

                const seior2 = document.getElementById('SubTotalExpensesinOrigen2');
                let seior2T = seior2.innerText.trim() === "" ? 0 : parseFloat(seior2.innerText.replace(/,/g, '')) || 0;

                total = ((vl*(seiorT-spahanT+seior2T)) / 100);

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            }else if (inputD == 'ttcpki'){

                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;

                const stro = document.getElementsByClassName('weightBKT')[0];
                let brtlb = stro.value.trim() === "" ? 0 : parseFloat(stro.value.replace(/,/g, '')) || 0;

                const stro2 = document.getElementsByClassName('wvkgm3')[0];
                let wvkgm3 = stro2.value.trim() === "" ? 0 : parseFloat(stro2.value.replace(/,/g, '')) || 0;

                if (brtlb > wvkgm3 ){
                    total = vl * brtlb;
                }else{
                    total = vl*wvkgm3;
                }

                total2 = 0.18 * total;

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                document.getElementsByClassName(inputIGV)[0].value = total2.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            }

            sumarCostEAD();
            sumarCostEADIGV();
        }

        function CalcularExAD2(val,inputD,inputIGV){

            let total = 0;
            let total2 = 0;

            if (inputD == 'cclfcmi'){
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;

                const CifValue2 = document.getElementById('CifValue2');
                let CifValue2T = CifValue2.innerText.trim() === "" ? 0 : parseFloat(CifValue2.innerText.replace(/,/g, '')) || 0;

                const oper = vl*CifValue2T;

                if (oper <  110){
                    total = 110.00;
                }else{
                    total = (oper/ 100);
                }

                total2 = 0.18 * total;

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                document.getElementsByClassName(inputIGV)[0].value = total2.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            }else if (inputD == 'cclalpl'){

                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;

                const stro = document.getElementsByClassName('itemsV')[0];
                let itemsV = stro.value.trim() === "" ? 0 : parseFloat(stro.value.replace(/,/g, '')) || 0;
            
                if (itemsV > 3){
                    total = (itemsV-3)*vl;
                }else {
                    total = 0;
                }

                total2 = 0.18 * total;

                document.getElementsByClassName(inputD)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                document.getElementsByClassName(inputIGV)[0].value = total2.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            } else if (inputD == 'oexpsh'){
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;
                total = 0.18 * vl;

                document.getElementsByClassName(inputD)[0].value = (val.value).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                document.getElementsByClassName(inputIGV)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            } else {
                const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;
                total = 0.18 * vl;

                document.getElementsByClassName(inputIGV)[0].value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            sumarCostEAD2();
            sumarCostEADIGV2();
        }

        function sumarCostEAD2(val,inputD) {
            
            const inputs = document.querySelectorAll('.sum-CostEAD2');
            
            let total = 0;
        
            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('SubTotalExpensesatDestination2').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function sumarCostEADIGV2(){

            const inputs = document.querySelectorAll('.sum-CostEADIGV2');
            
            let total = 0;

            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });
            
            total = Math.round((total + 0.005) * 100) / 100;

            document.getElementById('SubTotalExpensesatDestinationIGV2').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }
        

        function sumarCostEAD(val,inputD) {
            
            const inputs = document.querySelectorAll('.sum-CostEAD');
            
            let total = 0;
        
            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('SubTotalExpensesatDestination').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function sumarCostEADIGV(){

            const inputs = document.querySelectorAll('.sum-CostEADIGV');
            
            let total = 0;

            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            total = Math.round((total + 0.005) * 100) / 100;

            document.getElementById('SubTotalExpensesatDestinationIGV').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function sumarITAX() {

            const inputs = document.querySelectorAll('.sum-CostITAX');
            
            let total = 0;

            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('SubTotalImportTaxes').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            const stro = document.getElementById('SubtotalExpensesinOrigen');
            const stroTotal = stro.innerText.trim() === "" ? 0 : parseFloat(stro.innerText.replace(/,/g, '')) || 0;

            const stro2 = document.getElementById('SubTotalExpensesinOrigen2');
            const stro2Total = stro2.innerText.trim() === "" ? 0 : parseFloat(stro2.innerText.replace(/,/g, '')) || 0;

            const stro3 = document.getElementById('SubTotalExpensesatDestination');
            const stro3Total = stro3.innerText.trim() === "" ? 0 : parseFloat(stro3.innerText.replace(/,/g, '')) || 0;

            const stro4 = document.getElementById('SubTotalExpensesatDestination2');
            const stro4Total = stro4.innerText.trim() === "" ? 0 : parseFloat(stro4.innerText.replace(/,/g, '')) || 0;

            const TotalImpEx = parseFloat(stroTotal) + parseFloat(stro2Total) + parseFloat(stro3Total) + parseFloat(stro4Total) + total;

            document.getElementById('TotalImportExpenses').innerText = TotalImpEx.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            calcularFinExp();
        }

        function sumarITAXIGV() {

            const inputs = document.querySelectorAll('.sum-CostITAXIGV');
            
            let total = 0;

            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('SubTotalImportTaxesIGV').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            
            const stro = document.getElementById('SubtotalExpensesinOrigenIGV');
            const stroTotal = stro.innerText.trim() === "" ? 0 : parseFloat(stro.innerText.replace(/,/g, '')) || 0;

            const stro2 = document.getElementById('SubTotalExpensesinOrigen2IGV');
            const stro2Total = stro2.innerText.trim() === "" ? 0 : parseFloat(stro2.innerText.replace(/,/g, '')) || 0;

            const stro3 = document.getElementById('SubTotalExpensesatDestinationIGV');
            const stro3Total = stro3.innerText.trim() === "" ? 0 : parseFloat(stro3.innerText.replace(/,/g, '')) || 0;

            const stro4 = document.getElementById('SubTotalExpensesatDestinationIGV2');
            const stro4Total = stro4.innerText.trim() === "" ? 0 : parseFloat(stro4.innerText.replace(/,/g, '')) || 0;


            const TotalImpEx = parseFloat(stroTotal) + parseFloat(stro2Total) + parseFloat(stro3Total) + parseFloat(stro4Total) + total;

            document.getElementById('TotalImportExpensesIGV').innerText = TotalImpEx.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        }

        function sumarFinExp() {
            const inputs = document.querySelectorAll('.sum-FinExp');
            
            let total = 0;

            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('TotalFinancialExpenses').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });


            //Sumar TOTAL COSTO FOR COPE

            const valorMer = document.getElementById('merchandiseValue').value.replace(/,/g, '');


            let TIE = document.getElementById('TotalImportExpenses');
            let valueTIE = TIE.innerText.trim() === "" ? 0 : parseFloat(TIE.innerText.replace(/,/g, '')) || 0;

            TotalCFC = total + parseFloat(valorMer) + valueTIE;

            document.getElementById('TotalCostoForCope').innerText = TotalCFC.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });


            //Sumar TOTAL COSTO FOR COPE IGV

            const stro0 = document.getElementById('SubTotalImportTaxesIGV');
            const stro0Total = stro0.innerText.trim() === "" ? 0 : parseFloat(stro0.innerText.replace(/,/g, '')) || 0;

            const stro = document.getElementById('SubtotalExpensesinOrigenIGV');
            const stroTotal = stro.innerText.trim() === "" ? 0 : parseFloat(stro.innerText.replace(/,/g, '')) || 0;

            const stro2 = document.getElementById('SubTotalExpensesinOrigen2IGV');
            const stro2Total = stro2.innerText.trim() === "" ? 0 : parseFloat(stro2.innerText.replace(/,/g, '')) || 0;

            const stro3 = document.getElementById('SubTotalExpensesatDestinationIGV2');
            const stro3Total = stro3.innerText.trim() === "" ? 0 : parseFloat(stro3.innerText.replace(/,/g, '')) || 0;

            const TotalImpEx = stro3Total + stro2Total + stroTotal + stro0Total;

            document.getElementById('TotalCostoForCopeIGV').innerText = TotalImpEx.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });


            //Sumar Import FACTOR FOR COPE

            const AdValorem = document.getElementById('AdValorem');
            const AdValoremTotal = AdValorem.value.trim() === "" ? 0 : parseFloat(AdValorem.value.replace(/,/g, '')) || 0;

            let ImportFFC = 0;

            ImportFFC = TotalCFC / parseFloat(valorMer);

            document.getElementById('ImportFactorforCope').innerText = ImportFFC.toFixed(3);
        }

        function CalcularSubtotal(val, inputD){

            let total = 0;

            const vl = parseFloat((val.value || '').replace(/,/g, '')) || 0;            

            if (inputD == 'operMarg'){

                let TIE = document.getElementById('TotalImportExpenses');
                let valueTIE = TIE.innerText.trim() === "" ? 0 : parseFloat(TIE.innerText.replace(/,/g, '')) || 0;

                let gastra = document.getElementsByClassName('gastra')[0];
                let gastraT = gastra.value.trim() === "" ? 0 : parseFloat(gastra.value.replace(/,/g, '')) || 0;

                total = (valueTIE+gastraT) * vl;

                let resultado = (total / 100).toFixed(2);

                document.getElementsByClassName(inputD)[0].value = resultado.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }else{

                let TIE = document.getElementById('TotalImportExpenses');
                let valueTIE = TIE.innerText.trim() === "" ? 0 : parseFloat(TIE.innerText.replace(/,/g, '')) || 0;

                total = vl * valueTIE;

                let resultado = (total / 100).toFixed(2);

                document.getElementsByClassName(inputD)[0].value = resultado.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            sumarSubtotal();
       
        }

        function sumarSubtotal(){

            const inputs = document.querySelectorAll('.sum-Subtotal');
            
            let total = 0;

            inputs.forEach(input => {
                const valor = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += valor;
            });

            document.getElementById('TotalSubtotal').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });


            ///CALCULAR SALE COST

            const TtlFC = document.getElementById('TotalCostoForCope');
            const TtlFCTotal = TtlFC.innerText.trim() === "" ? 0 : parseFloat(TtlFC.innerText.replace(/,/g, '')) || 0;

            const saleCost = TtlFCTotal+total;

            document.getElementById('TotalSaleCost').innerText = saleCost.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            ///CALCULAR SALE COST IGV

            
            const TtlFCigv = document.getElementById('TotalCostoForCopeIGV');
            const TtlFCTotalIGV = TtlFCigv.innerText.trim() === "" ? 0 : parseFloat(TtlFCigv.innerText.replace(/,/g, '')) || 0;

            const TotalSubtotalIGV = document.getElementById('TotalSubtotalIGV');
            const TotalSubtotalIGVT = TotalSubtotalIGV.innerText.trim() === "" ? 0 : parseFloat(TotalSubtotalIGV.innerText.replace(/,/g, '')) || 0;

            let saleCostIGV = TtlFCTotalIGV+TotalSubtotalIGVT;

            document.getElementById('TotalSaleCostIGV').innerText = saleCostIGV.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            ///CALCULAR SALES FACTOR

            const AdValorem = document.getElementById('AdValorem');
            const AdValoremTotal = AdValorem.value.trim() === "" ? 0 : parseFloat(AdValorem.value.replace(/,/g, '')) || 0;

            const valorMer2 = document.getElementById('merchandiseValue').value.replace(/,/g, '');

            let salesFactorT = 0;
            
            if (valorMer2 < 2000){
                salesFactorT = Math.floor((saleCost / valorMer2) * 1000) / 1000;
            }else {
                salesFactorT = Math.floor(((saleCost - AdValoremTotal) / valorMer2) * 1000) / 1000;
            }

            document.getElementById('SalesFactorTotal').innerText = salesFactorT.toLocaleString('en-US', { minimumFractionDigits: 3, maximumFractionDigits: 3 });

            ///Total Sales Price

            const MarkUp = document.getElementById('MarkUp');
            const MarkUpT = MarkUp.innerText.trim() === "" ? 0 : parseFloat(MarkUp.innerText.replace(/,/g, '')) || 0;

            const TtlSPTotal = saleCost+MarkUpT;

            document.getElementById('TotalSalesPrice').innerText = TtlSPTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            //CALCULAR GROSS PROFIT


            const intFinv = document.getElementsByClassName('intFinv')[0];
            const intFinvT = intFinv.value.trim() === "" ? 0 : parseFloat(intFinv.value.replace(/,/g, '')) || 0;
            
            const GrossT = parseFloat(TtlSPTotal)-(parseFloat(TtlFCTotal)-parseFloat(intFinvT));

            document.getElementById('GrossProfit').innerText = GrossT.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });


            //CALCULAR MARGING AGAINST SALE

            if (GrossT !== 0) {  
                let MargingT = (parseFloat(GrossT)/parseFloat(TtlSPTotal)) * 100;
                document.getElementById("MargingAgainstSale").innerText = MargingT.toFixed(2) + "%";
            } else {
                document.getElementById("MargingAgainstSale").innerText = "Error: División por 0";
            }

            //CALCULAR MARGIN AGAINST COST

            if (GrossT !== 0) {  
                let MargingC = (parseFloat(GrossT)/parseFloat(TtlFCTotal)) * 100;
                document.getElementById("MargingAgainstCost").innerText = MargingC.toFixed(2) + "%";
            } else {
                document.getElementById("MargingAgainstCost").innerText = "Error: División por 0";
            }


            //CALCULAR TOTAL
            const TotalEmba =  Math.floor(parseFloat(TtlSPTotal) / parseFloat(valorMer2) * 1000) / 1000;


            document.getElementById("TotalEmba").innerText = TotalEmba.toLocaleString('en-US', { minimumFractionDigits: 3, maximumFractionDigits: 3});
            
        }


        const inputs = document.getElementsByClassName("text-end");

        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener("keypress", function(event) {
                if (!/[\d,\.%]/.test(event.key)) {
                    event.preventDefault();
                }
            });

            inputs[i].addEventListener("input", function(event) {
                let value = event.target.value.replace(/,/g, ''); // Elimina comas previas
                if (!/^\d*\.?\d*$/.test(value)) return; // Evita caracteres no válidos
                
                let [integer, decimal] = value.split('.');
                integer = integer.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Agrega comas

                event.target.value = decimal !== undefined ? `${integer}.${decimal}` : integer;
            });
        }

        function limpiar(){
            const inputs = document.querySelectorAll('.limpiarinp');
            
            inputs.forEach(input => {
                input.value = "";
            });

            const labels = document.querySelectorAll('.limpiarlbl');

            labels.forEach(label => {
                label.textContent = "";
            });

        }

    </script>
</body>
</html>