function trasporteToCustomer() {
        let E23 = parseFloat($(".weightBKT").val().replace(/,/g, '')) || 0;
        let E25 = parseFloat($(".wvkgm3").val().replace(/,/g, '')) || 0;

        let mayor = (E25 > E23) ? E25 : E23;
        let resultado = ((mayor * 2) + 60) / 3.7;

        // Formatear el resultado con separador de miles y 2 decimales
        $(".trtoCukg").val(new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(resultado));
    }

    $(".weightBKT, .wvkgm3").on("input", trasporteToCustomer);

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
    //document.getElementsByClassName('weightBL')[0].value = total2;
    document.getElementsByClassName('weightBKT')[0].value = total3;
   }

   document.addEventListener("DOMContentLoaded", function() {
        CalcularDelivery();
        weightCalcular();
        calcularggplus();
        calcularTrtoCukg();
        calcularInFin();
    });
    
    function sumarGogreenPlI(val,input_id){
       
        let valor = parseFloat(val.value.replace(/,/g, '')) || 0; // Quitar comas y convertir a número
        let porcentaje = (valor * 0.18).toFixed(2);
        document.getElementById(input_id).value = porcentaje;
    }
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
            
            // Verificar si el input tiene el ID incoterm_11_2
            if (input.id === 'incoterm_11_2') {
                // Restar este valor en lugar de sumarlo
                total -= valor;
            } else {
                // Sumar normalmente para todos los demás inputs
                total += valor;
            }
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
                total = setCifValue($('#calculo_idProveedor').val(),$('#calculo_semana').val());
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

// -------------------------------------


