<!-- Modal calculo -->
<div class="modal fade" id="viewRowModal" tabindex="-1" aria-labelledby="viewRowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl w-100">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewRowModalLabel">Detalles del Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="mt-3" id="formEmbarque">
   
              <input type="hidden" id="calculo_idProveedor">
              <input type="hidden" id="calculo_semana">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item pt-4 content_terms_and_conditions">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-blue text-white d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                            <span>TERMS AND CONDITIONS</span>
                            <i class="bi bi-chevron-down ms-2"></i>
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" >
                          <div class="accordion-body">
                              <!-- MERCHANDISE VALUE, ExWorks -->
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="merchandiseValue" class="form-label">MERCHANDISE VALUE, ExWorks</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_merchandise_value_exworks_col_2 text-end" id="merchandiseValue" value="" oninput="limpiar()">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_merchandise_value_exworks_col_3" id="merchandiseValueMoneda" value="USD">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- INCOTERM -->
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="incoterm" class="form-label">INCOTERM</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control name_incoterm_col_2 text-center" id="incoterm" value="DDP-TALARA">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Vendor PO Pocesing -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Vendor PO Pocesing</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_vendor_po_pocesing_col_2 text-center sum-CD venPPo" id="sum_1" value="3" oninput="sumarCD()">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_vendor_po_pocesing_col_3 text-center" id="" value="">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Delivery ExWorks -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Delivery ExWorks</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_delivery_exworks_col_2 text-center sum-CD DeliveryET" value="" id="sum_2" readonly="readonly">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_delivery_exworks_col_3 text-center DeliveryE" value="1" readonly="readonly">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Pick-up -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Pick-up</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_pick_up_col_2 text-center sum-CD pickup" id="sum_3" value="2"  oninput="sumarCD()">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_pick_up_col_3 text-center" id="" value="">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Transit Time (DTD) -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Transit Time (DTD)</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_transit_time_dtd__col_2 text-center sum-CD transitTime" id="sum_4" value="7"  oninput="sumarCD()">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_transit_time_dtd__col_3 text-center" id="" value="">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Custom Clearance -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label ">Custom Clearance</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_custom_clearance_col_2 text-center sum-CD custclea" id="sum_5" value="3"  oninput="sumarCD()">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_custom_clearance_col_3 text-center" id="" value="">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Local inspection and Repacking -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label text-center">TIME LINE</label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Local inspection and Repacking</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_local_inspection_and_repacking_col_2 text-center sum-CD timeline" id="sum_6" value="1" oninput="sumarCD()">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_local_inspection_and_repacking_col_3 text-center" id="" value="">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Delivery to customer -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Delivery to customer</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_delivery_to_customer_col_2 text-center sum-CD deltocust" id="sum_7" value="4" oninput="sumarCD()">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_delivery_to_customer_col_3 text-center" id="" value="">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Service compliance -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Service compliance</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_service_compliance_col_2 text-center servcompl" id="" value="">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" class="form-control name_service_compliance_col_3 text-center" id="" value="">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Customer Delivery -->
                              <div class="row mb-3 text-white bg-danger p-2">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Customer Delivery</label>
                                  </div>
                                  <div class="col-md-3 text-center">
                                      <label for="pieces" class="form-label name_customer_delivery_col_2" id="customerDeliveryTotal"></label>
                                  </div>
                                  <div class="col-md-3 text-center">
                                      <label for="pieces" class="form-label name_customer_delivery_col_3" id="customerDeliveryTotalIGV"></label>
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Payment to Vendor -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Payment to Vendor</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control name_payment_to_vendor_col_2 text-center" id="" value="30">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Customer Payment -->
                              <div class="row mb-3">
                                  <div class="col-md-2">
                                      <label for="pieces" class="form-label"></label>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="pieces" class="form-label">Customer Payment</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control name_customer_payment_col_2 text-center customerPayment" id="" value="60">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Port of Origin -->
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="portOrigin" class="form-label">Port of Origin</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control name_port_of_origin_col_2" id="portOrigin" value="Houston, TX - USA">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Port of Destination -->
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="portDestination" class="form-label">Port of Destination</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control name_port_of_destination_col_2" id="portDestination" value="Callao, PE">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Delivery Location -->
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="deliveryLocation" class="form-label">Delivery Location</label>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control name_delivery_location_col_2" id="deliveryLocation" value="Talara, PE">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Number de pieces / Items -->
                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="pieces" class="form-label">Number de pieces / Items</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_number_de_pieces_items_col_2 text-center" id="" value="0" readonly="readonly">
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_number_de_pieces_items_col_3 text-center itemsV" id="" value="31" readonly="readonly">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Weight - Net, lb -->
                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="pieces" class="form-label">Weight</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="pieces" class="form-label">Net, lb</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_weight_net_lb_col_3 text-center weightNLB" id="" value="1045.630" readonly="readonly">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Weight - Net, kg -->
                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="pieces" class="form-label">Weight</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="pieces" class="form-label">Net, kg</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_weight_net_kg_col_3 text-center weightNKG" id="" readonly>
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Weight - Bruto, lb -->
                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="pieces" class="form-label">Weight</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="pieces" class="form-label">Bruto, lb</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_weight_bruto_lb_col_3 text-center weightBL" id="" readonly>
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Weight - Bruto, kg -->
                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="pieces" class="form-label">Weight</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="pieces" class="form-label">Bruto, kg</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_weight_bruto_kg_col_3 text-center weightBKT" id="" readonly>
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Weight/Volume - lb-ft³ -->
                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="pieces" class="form-label">Weight/Volume</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="pieces" class="form-label">lb-ft³</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_weight_volume_lb_ft3_col_3 text-center wvklbft3" value="1015.518" oninput="calcularggplus()" readonly="readonly">
                                  </div>
                              </div>
                              <hr class="border opacity-75">
                          
                              <!-- Weight/Volume - kg-m³ -->
                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="pieces" class="form-label">Weight/Volume</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="pieces" class="form-label">kg-m³</label>
                                  </div>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control name_weight_volume_kg_m3_col_3 text-center wvkgm3" id="" value="552.493" oninput="calcularTrtoCukg()" readonly="readonly">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
  
                  <div class="content_expense_in_origen">
                      <div class="accordion-item pt-4 ">
                          <h2 class="accordion-header">
                          <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                              EXPENSES IN ORIGEN
                              <i class="bi bi-chevron-down ms-2"></i>
                          </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" >
                              <div class="accordion-body">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Shipper Packing and Handling</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_shipper_packin_col_1 col-data-1 text-center" id="incoterm_1_1" value="Quote" disabled="disabled">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_shipper_packin_col_2 col-data-2 text-end sum-input limpiarinp spahan" id="incoterm_1_2" value="" oninput="CalcularIGVEIO(this,'shpandhanIGV');">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_shipper_packin_col_3 col-data-3 text-end sum-inputIGV limpiarinp shpandhanIGV" id="" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Pick Uo via Truck, per kilogram</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_pick_uo_via_truck_per_kilogram_col_1 col-data-1  text-center" id="incoterm_2_1" value="0.37" oninput="sumarExInOr(this,'piuvtrpkil','piuvtrpkilIGV');">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_pick_uo_via_truck_per_kilogram_col_2 col-data-2  text-end sum-input limpiarinp piuvtrpkil" id="" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_pick_uo_via_truck_per_kilogram_col_3 col-data-3  text-end sum-inputIGV limpiarinp piuvtrpkilIGV" id="" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Terminal Handling -Forwarding, per shipment</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_terminal_handling_forwarding_per_shiment_col_1 col-data-1  text-center" id="incoterm_3_1" oninput="sumarExInOr(this,'terhanfopsh','terhanfopshIGV');">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_terminal_handling_forwarding_per_shiment_col_2 col-data-2  text-end sum-input limpiarinp terhanfopsh" id="" value="" oninput="CalcularIGVEIO(this,'terhanfopshIGV');">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_terminal_handling_forwarding_per_shiment_col_3 col-data-3  text-end sum-inputIGV limpiarinp terhanfopshIGV" id="" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Administrative Handling, per kilogram</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_administrative_handling_per_kilogram_col_1 col-data-1  text-center" id="incoterm_4_1" oninput="sumarExInOr(this,'adhanpkil','adhanpkilIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_administrative_handling_per_kilogram_col_2 col-data-2  text-end sum-input limpiarinp adhanpkil" id="" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_administrative_handling_per_kilogram_col_3 col-data-3  text-end sum-inputIGV limpiarinp adhanpkilIGV" id="" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Export Custom Clearence, per shipment</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_export_custom_clearence_per_shipment_col_1 col-data-1 text-center" id="incoterm_5_1" oninput="sumarExInOr(this,'excuclpesh','excuclpeshIGV');">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_export_custom_clearence_per_shipment_col_2 col-data-2 text-end sum-input limpiarinp excuclpesh" id="" value="" oninput="CalcularIGVEIO(this,'excuclpeshIGV');">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_export_custom_clearence_per_shipment_col_3 col-data-3 text-end sum-inputIGV limpiarinp excuclpeshIGV" id="" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Export Custom Clearence - Add Items, $/item</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_export_custom_clearence_add_items_col_1 col-data-1 text-center" id="incoterm_6_1" oninput="sumarExInOr(this,'expoCusCladItem','expoCusCladItemIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_export_custom_clearence_add_items_col_2 col-data-2 text-end sum-input limpiarinp expoCusCladItem" id="" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_export_custom_clearence_add_items_col_3 col-data-3 text-end sum-inputIGV limpiarinp expoCusCladItemIGV" id="" value="" readonly>
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
                          <!-- Door To Door Service -->
                          <div class="row p-2">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Door To Door Service</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_door_to_door_service_col_1 col-data-1 text-center" id="incoterm_7_1" value="Quote" disabled="disabled">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_door_to_door_service_col_2 col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_7_2" value=""  oninput="CalcularIGVEIO2(this,'dotodoseIGV');">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_door_to_door_service_col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp dotodoseIGV" id="" value=""  readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Freight, per kilogram -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Freight, per kilogram</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_freight_per_kilogram_col_1 col-data-1 text-center" id="incoterm_8_1" oninput="sumarExInOr2(this,'freperkilI','freperkilIGV')">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_freight_per_kilogram_col_2 col-data-2 text-end sum-CostEIO limpiarinp freperkilI" id="" value="" readonly>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_freight_per_kilogram_col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp freperkilIGV" id="" value="" readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Cargo screening Fee, per kilogram -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Cargo screening Fee, per kilogram</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_cargo_screening_fee_per_kilogram_col_1 col-data-1 text-center" id="incoterm_9_1" oninput="sumarExInOr2(this,'cargsfperkilI','cargsfperkilIGV')">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_cargo_screening_fee_per_kilogram_col_2 col-data-2 text-end sum-CostEIO limpiarinp cargsfperkilI" id="" value="" readonly>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_cargo_screening_fee_per_kilogram_col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp cargsfperkilIGV" id="" value="" readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Mainleg Security Filing Fee, per shipment -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Mainleg Security Filing Fee, per shipment</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_mainleg_security_filing_fee_per_shipment_col_1 col-data-1 text-center" id="incoterm_17_1" oninput="sumarExInOr2(this,'maisecffpsh','maisecffpshIGV')">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_mainleg_security_filing_fee_per_shipment_col_2 col-data-2 text-end sum-CostEIO limpiarinp maisecffpsh" id="" value="" readonly>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_mainleg_security_filing_fee_per_shipment_col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp maisecffpshIGV" id="" value="" readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Transportation Charges (currier) -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Transportation Charges (currier)</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_transportation_charges_currier__col_1 col-data-1 text-center" id="incoterm_10_1" value="Quote" disabled="disabled">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_transportation_charges_currier__col_2 col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_10_2" value="" oninput="CalcularIGVEIO2(this,'transChIGV');">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_transportation_charges_currier__col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp transChIGV" id="" value="" readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Discount (currier) -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Discount (currier)</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_discount_currier__col_1 col-data-1 text-center" id="incoterm_11_1" value="Quote" disabled="disabled">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_discount_currier__col_2 col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_11_2" value="" oninput="CalcularIGVEIO2(this,'discCuIGV');">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_discount_currier__col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp discCuIGV" id="" value="" readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Shipment Protection, per 110% FCA/FAS -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Shipment Protection, per 110% FCA/FAS</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_shipment_protection_per_110_fca_fas_col_1 col-data-1 text-center" id="incoterm_12_1"  oninput="sumarExInOr2(this,'shipProPFCA','shipProPFCAIGV')">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_shipment_protection_per_110_fca_fas_col_2 col-data-2 text-end sum-CostEIO limpiarinp shipProPFCA" id="" value="" readonly>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_shipment_protection_per_110_fca_fas_col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp shipProPFCAIGV" id="incoterm_12_3" value="" readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- GoGreen Plus -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">GoGreen Plus</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_gogreen_plus_col_1 col-data-1 text-center" id="incoterm_14_1" value="Quote" disabled="disabled">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_gogreen_plus_col_2 col-data-2 sum-CostEIO text-end limpiarinp gogreenPlI" id="" value="" oninput="CalcularIGVEIO2(this,'gogreenPlIGV')">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_gogreen_plus_col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp gogreenPlIGV" id="gogreenPlIGV" value="" readonly>
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Demand Surcharge (currier) -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Demand Surcharge (currier)</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_demand_surcharge_currier__col_1 col-data-1 text-center" id="incoterm_15_1" value="Quote" disabled="disabled">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_demand_surcharge_currier__col_2 col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_15_2" value="" oninput="CalcularIGVEIO2(this,'dotodoseIGV'); ">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_demand_surcharge_currier__col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp demanSurCIGV" id="" value="" >
                              </div>
                          </div>
                          <hr class="border opacity-75">
      
                          <!-- Fuel Surcharge, (currier) -->
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="merchandiseValue" class="form-label">Fuel Surcharge, (currier)</label>
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_fuel_surcharge_currier__col_1 col-data-1 text-center" id="incoterm_16_1" value="Quote" disabled="disabled">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_fuel_surcharge_currier__col_2 col-data-2 text-end sum-CostEIO limpiarinp" id="incoterm_16_2" value="" oninput="CalcularIGVEIO2(this,'fulSurCuIGV');">
                              </div>
                              <div class="col-md-2">
                                  <input type="text" class="form-control name_fuel_surcharge_currier__col_3 col-data-3 text-end sum-CostEIOIGV limpiarinp fulSurCuIGV" id="" value="" >
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
                          <div class="row p-2 bg-pink fw-bold text-white mx-0">
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
                          <div class="row p-2 bg-pink fw-bold text-danger mx-0">
                              <div class="col-md-8">
                                  <label for="merchandiseValue" class="form-label">CIF Factor</label>
                              </div>
                              <div class="col-md-4 text-center">
                                  <label for="merchandiseValue" class="form-label limpiarlbl" id="CifFactor2"></label>
                              </div>
                          </div>
                      </div>
                  </div>
        
  
                  <div class="content_expense_at_destination">
                      <div class="accordion-item pt-4 ">
                          <h2 class="accordion-header">
                          <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                              EXPENSES AT DESTINATION
                              <i class="bi bi-chevron-down ms-2"></i>
                          </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" >
                              <div class="accordion-body">
                                  <!-- Dest. Administrative Handling, per shipment -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Dest. Administrative Handling, per shipment</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_dest_administrative_handling_per_shipment_col_1 col-data-1 limpiarinp" id="" value="" oninput="CalcularExAD(this,'dahpsh','dahpshIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_dest_administrative_handling_per_shipment_col_2 col-data-2 text-end sum-CostEAD limpiarinp dahpsh" id="" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_dest_administrative_handling_per_shipment_col_3 col-data-3 text-end sum-CostEADIGV limpiarinp dahpshIGV" id="" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Charges Collect Fee, % Origen+Freight -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Charges Collect Fee, % Origen+Freight</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_charges_collect_fee_origen_freight_col_1 col-data-1 limpiarinp" id="" value="" oninput="CalcularExAD(this,'ccfof','ccfofIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_charges_collect_fee_origen_freight_col_2 col-data-2 text-end sum-CostEAD limpiarinp ccfof" id="" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_charges_collect_fee_origen_freight_col_3 col-data-3 text-end sum-CostEADIGV limpiarinp ccfofIGV" id="" value="" oninput="sumarCostEADIGV();">
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Transport to COPE, per kilogram -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Transport to COPE, per kilogram</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_transport_to_cope_per_kilogram_col_1 col-data-1 limpiarinp" id="" value="" oninput="CalcularExAD(this,'ttcpki','ttcpkiIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_transport_to_cope_per_kilogram_col_2 col-data-2 text-end sum-CostEAD limpiarinp ttcpki" id="" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_transport_to_cope_per_kilogram_col_3 col-data-3 text-end sum-CostEADIGV limpiarinp ttcpkiIGV" id="" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Transport to Customer, US$/kg -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Transport to Customer, US$/kg</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_transport_to_customer_us_kg_col_1 col-data-1 limpiarinp" id="" value="Quote" disabled="disabled">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_transport_to_customer_us_kg_col_2 col-data-2 text-end sum-CostEAD limpiarinp trtoCukg" id="" oninput="trasporteToCustomer()"  >
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_transport_to_customer_us_kg_col_3 col-data-3 text-end sum-CostEADIGV limpiarinp trtoCukgIGV" id="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Sub total Expenses in Origen -->
                                  <div class="row bg-pink p-2">
                                      <div class="col-md-8">
                                          <label for="merchandiseValue" class="form-label">Sub total Expenses in Origen</label>
                                      </div>
                                      <div class="col-md-2 text-end">
                                          <label for="merchandiseValue" class="form-label name_sub_total_expenses_in_origen_col_2 limpiarlbl" id="SubTotalExpensesatDestination"></label>
                                      </div>
                                      <div class="col-md-2 text-end">
                                          <label for="merchandiseValue" class="form-label name_sub_total_expenses_in_origen_col_3 limpiarlbl" id="SubTotalExpensesatDestinationIGV"></label>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Custom Clearance Fee, 0.5% CIF - Min 150 -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Custom Clearance Fee, 0.5% CIF - Min 150</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_custom_clearance_fee_0_5_cif_min_150_col_1 col-data-1 limpiarinp" id="incoterm_35_1" value="" oninput="CalcularExAD2(this,'cclfcmi','cclfcmiIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_custom_clearance_fee_0_5_cif_min_150_col_2 col-data-2 text-end sum-CostEAD2 limpiarinp cclfcmi" id="incoterm_35_2" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_custom_clearance_fee_0_5_cif_min_150_col_3 col-data-3 text-end sum-CostEADIGV2 limpiarinp cclfcmiIGV" id="incoterm1" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Custom Clearance-Additional Lines, per line -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Custom Clearance-Additional Lines, per line</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_custom_clearance_additional_lines_per_line_col_1 col-data-1 limpiarinp" id="incoterm_32_1" value="" oninput="CalcularExAD2(this,'cclalpl','cclalplIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_custom_clearance_additional_lines_per_line_col_2 col-data-2 text-end sum-CostEAD2 limpiarinp cclalpl" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_custom_clearance_additional_lines_per_line_col_3 col-data-3 text-end sum-CostEADIGV2 limpiarinp cclalplIGV" id="incoterm1" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Operatives Expenses, per shipmet -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Operatives Expenses, per shipmet</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_operatives_expenses_per_shipmet_col_1 col-data-1 limpiarinp" id="incoterm_18_1" value="" oninput="CalcularExAD2(this,'oexpsh','oexpshIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_operatives_expenses_per_shipmet_col_2 col-data-2 text-end sum-CostEAD2 limpiarinp oexpsh" id="incoterm_18_2" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_operatives_expenses_per_shipmet_col_3 col-data-2 text-end sum-CostEADIGV2 limpiarinp oexpshIGV" id="incoterm2" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Administrative Expenses, US$ -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Administrative Expenses, US$</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_administrative_expenses_us__col_1 col-data-1 limpiarinp" id="incoterm_19_1" value="Quote" disabled="disabled">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_administrative_expenses_us__col_2 col-data-2 text-end sum-CostEAD2 limpiarinp" id="incoterm_19_2" value="" oninput="CalcularExAD2(this,'aeusIGV','aeusIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_administrative_expenses_us__col_3 col-data-3 text-end sum-CostEADIGV2 limpiarinp aeusIGV" id="incoterm3" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Inspection/Aforo Fisico, US$ -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Inspection/Aforo Fisico, US$</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_inspection_aforo_fisico_us__col_1 limpiarinp" id="incoterm_21_1" value="Quote" disabled="disabled">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_inspection_aforo_fisico_us__col_2 text-end sum-CostEAD2 limpiarinp" id="incoterm_21_2" value="" oninput="CalcularExAD2(this,'insafusIGV','insafusIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_inspection_aforo_fisico_us__col_3 text-end sum-CostEADIGV2 limpiarinp insafusIGV" id="incoterm5" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Storage, Talma Shohim -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Storage, Talma Shohim</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_storage_talma_shohim_col_1 col-data-1 limpiarinp" id="incoterm_23_1" value="Quote" disabled="disabled">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_storage_talma_shohim_col_2 col-data-2 text-end sum-CostEAD2 limpiarinp" id="incoterm_23_2" value="" oninput="CalcularExAD2(this,'stTSIGV','stTSIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_storage_talma_shohim_col_3 col-data-3 text-end sum-CostEADIGV2 limpiarinp stTSIGV" id="incoterm7" value="" readonly>
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
                  </div>
            
                  <div class="content_import_taxes">
                      <div class="accordion-item pt-4 ">
                          <h2 class="accordion-header">
                          <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                              IMPORT TAXES
                              <i class="bi bi-chevron-down ms-2"></i>
                          </button>
                          </h2>
                          <div id="flush-collapseFour" class="accordion-collapse collapse" >
                              <div class="accordion-body">
                                  <!-- Ad Valorem -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Ad Valorem</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_ad_valorem_col_1 col-data-1 text-end limpiarinp" id="incoterm_28_1" value="" oninput="CalcularITAX(this,'adval','advalIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_ad_valorem_col_2 col-data-2 text-end sum-CostITAX limpiarinp adval" id="AdValorem" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_ad_valorem_col_3 col-data-3 text-end sum-CostITAXIGV limpiarinp advalIGV" id="incoterm_28_3" value=""  oninput="sumarITAXIGV()">
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Surcharge -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Surcharge</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_surcharge_col_1 col-data-1 text-end limpiarinp" id="incoterm_29_1" value="" >
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_surcharge_col_2 col-data-2 text-end sum-CostITAX limpiarinp" id="incoterm_29_2" value="" oninput="sumarITAX()">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_surcharge_col_3 col-data-3 text-end sum-CostITAXIGV limpiarinp" id="incoterm_29_3" value="" oninput="sumarITAXIGV()">
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- IGV, 16% (CIF+AV) -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">IGV, 16% (CIF+AV)</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_igv_16_cif_av__col_1 col-data-1 text-end limpiarinp" id="incoterm_30_1" value="" oninput="CalcularITAX(this,'igvcifav','igvcifavIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_igv_16_cif_av__col_2 col-data-2 text-end sum-CostITAX limpiarinp igvcifav" id="incoterm_30_2" value="" oninput="sumarITAX()">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_igv_16_cif_av__col_3 col-data-3 text-end sum-CostITAXIGV limpiarinp igvcifavIGV" id="incoterm_30_3" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- IPM, 2% (CIF+AV) -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">IPM, 2% (CIF+AV)</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_ipm_2_cif_av__col_1 col-data-1 text-end limpiarinp" id="incoterm_31_1" value="" oninput="CalcularITAX(this,'ipmcifav','ipmcifavIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_ipm_2_cif_av__col_2 col-data-2 text-end sum-CostITAX limpiarinp ipmcifav" id="incoterm_31_2" value="" oninput="sumarITAX()">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_ipm_2_cif_av__col_3 col-data-3 text-end sum-CostITAXIGV limpiarinp ipmcifavIGV" id="incoterm_31_3" value="" readonly>
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                              
                                  <!-- Perception, 3.5 (CIF+AV+IGV+IPM) -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Perception, 3.5 (CIF+AV+IGV+IPM)</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_perception_3_5_cif_av_igv_ipm__col_1 col-data-1 text-end limpiarinp" id="incoterm_31_1" value="" oninput="CalcularITAX(this,'pcifavigip','pcifavigipIGV')">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_perception_3_5_cif_av_igv_ipm__col_2 col-data-2 text-end sum-CostITAX limpiarinp pcifavigip" id="incoterm_31_2" value="" oninput="sumarITAX()">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_perception_3_5_cif_av_igv_ipm__col_3 col-data-3 text-end sum-CostITAXIGV limpiarinp pcifavigipIGV" id="incoterm_31_3" value="" readonly>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="accordion-item">
                          <!-- Sub Total Import Taxes -->
                          <div class="row p-2 bg-pink fw-bold mx-0">
                              <div class="col-md-8">
                                  <label for="merchandiseValue" class="form-label">Sub Total Import Taxes</label>
                              </div>
                              <div class="col-md-2 text-end">
                                  <label for="merchandiseValue" class="form-label name_sub_total_import_taxes_col_2 limpiarlbl" id="SubTotalImportTaxes"></label>
                              </div>
                              <div class="col-md-2 text-end">
                                  <label for="merchandiseValue" class="form-label name_sub_total_import_taxes_col_3 limpiarlbl" id="SubTotalImportTaxesIGV"></label>
                              </div>
                          </div>
      
                          <!-- TOTAL IMPORT EXPENSES -->
                          <div class="row p-2 bg-orange fw-bold mx-0">
                              <div class="col-md-8">
                                  <label for="merchandiseValue" class="form-label">TOTAL IMPORT EXPENSES</label>
                              </div>
                              <div class="col-md-2 text-end">
                                  <label for="merchandiseValue" class="form-label name_total_import_expenses_col_2 limpiarlbl" id="TotalImportExpenses"></label>
                              </div>
                              <div class="col-md-2 text-end">
                                  <label for="merchandiseValue" class="form-label name_total_import_expenses_col_3 limpiarlbl" id="TotalImportExpensesIGV"></label>
                              </div>
                          </div>
                      </div>
                  </div>        
                  
                  <div class="content_fin_exp">
                      <div class="accordion-item pt-4 ">
                          <h2 class="accordion-header">
                          <button class="accordion-button collapsed bg-blue text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                              FIN EXP
                              <i class="bi bi-chevron-down ms-2"></i>
                          </button>
                          </h2>
                          <div id="flush-collapseFive" class="accordion-collapse collapse" >
                              <div class="accordion-body">
                                  <!-- Intereses Financieros -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Intereses Financieros</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_intereses_financieros_col_1 col-data-1 text-end limpiarinp intFin" id="incoterm_32_1" value="" oninput="calcularFinExp()" >
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_intereses_financieros_col_2 col-data-2 text-end sum-FinExp limpiarinp intFinv" id="incoterm_32_2" value="" readonly>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_intereses_financieros_col_3 col-data-3 text-end limpiarinp" id="incoterm_32_3" value="">
                                      </div>
                                  </div>
                                  <hr class="border opacity-75">
                                  
                                  <!-- Gastos de transferencia -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="merchandiseValue" class="form-label">Gastos de transferencia</label>
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_gastos_de_transferencia_col_1 col-data-1 text-end limpiarinp " id="incoterm_33_1" value="">
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_gastos_de_transferencia_col_2 col-data-2 text-end sum-FinExp limpiarinp gastra" id="incoterm_33_2" value="" >
                                      </div>
                                      <div class="col-md-2">
                                          <input type="text" class="form-control name_gastos_de_transferencia_col_3 col-data-3 text-end limpiarinp" id="incoterm_33_3" value="">
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
                                  <input type="text" class="form-control text-end limpiarinp contigencias sum-Subtotal" id="" value="">
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
                  
              </div>
  
              
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>










<div class="modal fade" id="modalDhl" tabindex="-1"  aria-labelledby="examplemodalDhl" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Información Básica del Envío -->
            <div class="card-body content_dhl">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tracking_number" class="form-label">Número de Tracking</label>
                        <input type="text" class="form-control name_numero_traking_col_1" id="tracking_number" name="tracking_number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="shipping_date" class="form-label">Fecha de Envío</label>
                        <input type="date" class="form-control name_fecha_envio_col_1" id="shipping_date" name="shipping_date" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="service_type" class="form-label">Tipo de Servicio</label>
                        <select class="form-select name_tipo_servicio_col_1" id="service_type" name="service_type" >
                            <option value="">Seleccionar...</option>
                            <option value="EXPRESS">DHL Express</option>
                            <option value="ECONOMY">DHL Economy</option>
                            <option value="DOMESTIC">DHL Domestic</option>
                            <option value="INTERNATIONAL">DHL International</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="shipping_cost" class="form-label">Costo de Envío</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control name_costo_col_1" id="shipping_cost" name="shipping_cost" step="0.01" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="shipping_cost" class="form-label">Dias de entrega</label>
                        <div class="input-group">
                            <input type="number" class="form-control name_dias_entrega_col_1" id="dias_entrega" name="dias_entrega" >
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>






<script>


</script>
