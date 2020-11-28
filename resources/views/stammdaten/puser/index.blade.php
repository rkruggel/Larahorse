@extends('layouts.master')

@section('file', 'larahorse/resources/views/stammdaten/puser/index.blade.php')

@section('title', 'LaraHorse')

@push('css')
    <!-- add the jQWidgets base styles and one of the theme stylesheets -->
    <link rel="stylesheet" href="/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="/jqwidgets/styles/jqx.darkblue.css" type="text/css" />

    <style>
    </style>
@endpush

@push('scriptOnTop')
    <!-- add the jQWidgets framework -->
    <script type="text/javascript" src="/jqwidgets/jqxcore.js"></script>
    <!-- add one or more widgets -->
    <script type="text/javascript" src="/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxdatatable.js"></script>
    <script type="text/javascript" src="/jqwidgets/jqxtabs.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {

            //alert('start');

            $("#jqxbutton").jqxButton(
                { width: '120px', height: '35px', theme: 'darkblue' }
            );

            //$("#jqxbutton").jqxButton({ disabled: true });

            $('#jqxbutton').on('click', function (event) {
                alert('Button is Clicked');
            });


            /* const button = new jqxButton("button", { width: '120px', height: '35px', theme: 'material'}); */

            /* button */
            /* $("#jqxbutton2").jqxButton({ width: '250', height: '25', disabled: true, theme: 'default' }); */
            /* $("#jqxButton2").on('click', function () {
              alert('Button Clicked');
            });
            */

            // https://www.jqwidgets.com/jquery-widgets-demo/demos/jqxgrid/index.htm#demos/jqxgrid/contextmenu.htm
            var data = @JSON($users);
            //var url = 'http://localhost:8082/api/puser'

            /** datatable */
            var source = {
                datatype: "json",
                id: 'id',
                //url: url,
                localdata: data,
                datafields: [
                    { name: 'id', type: 'int' },
                    { name: 'title', type: 'string' },
                    { name: 'anrede', type: 'string' },
                    { name: 'vorname', type: 'string' },
                    { name: 'nachname', type: 'string' },
                    { name: 'rufname', type: 'string' },
                    { name: 'zusatz', type: 'string' },
                    { name: 'email',  type: 'string' },
                    { name: 'www', type: 'string' },
                    { name: 'anschrift', type: 'string' },
                    { name: 'geb', type: 'date', format: 'dd.MM.yyyy' },
                    { name: 'landsmann', type: 'string' },
                    { name: 'jtelefon', type: 'string' },
                    { name: 'jfield', type: 'string' },
                    { name: 'aufgabe', type: 'string'},
                    { name: 'bemerkung', type: 'string' },
                ],
                addRow: function (rowID, rowData, position, commit) {
                    // synchronize with the server - send insert command
                    // call commit with parameter true if the synchronization with the server is successful
                    // and with parameter false if the synchronization failed.
                    // you can pass additional argument to the commit callback which represents the new ID if it is generated from a DB.
                    commit(true);
                },
                updateRow: function (rowID, rowData, commit) {
                    // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful
                    // and with parameter false if the synchronization failed.
                    commit(true);
                },
                deleteRow: function (rowID, commit) {
                    // synchronize with the server - send delete command
                    // call commit with parameter true if the synchronization with the server is successful
                    // and with parameter false if the synchronization failed.
                    commit(true);
                }
            };

            // initialize the row details.
            var initRowDetail = function (id, row, element, rowinfo) {
                var tabsdiv = null;
                var information = null;
                var komm = null;
                var notes = null;

                // update the details height.
                rowinfo.detailsHeight = 150;
                element.append($("" +
                    "<div style='margin: 10px;'>" +
                    "  <ul style='margin-left: 30px;'>" +
                    "    <li class='title'>Title</li>" +
                    "    <li>Kommunikation</li>" +
                    "    <li>Notes</li>" +
                    "  </ul>" +
                    "  <div class='information'></div>" +
                    "  <div class='komm'></div>" +
                    "  <div class='notes'></div>" +
                    "</div>"));
                tabsdiv = $(element.children()[0]);

                if (tabsdiv != null) {
                    /** -----------------------------------------------
                     * die Tabs zusammenstellen
                     * ------------------------------------------------
                     */
                    information = tabsdiv.find('.information');     // erstes Tab
                    komm = tabsdiv.find('.komm');                   // zweites Tab
                    notes = tabsdiv.find('.notes');                 // drittes Tab

                    // Den ersten Tab-Namen setzen
                    var title = tabsdiv.find('.title');
                    title.text(row.vorname);



                    /** -----------------------------------------------
                     *   erstes Tab zusammenbauen (information)
                     * ------------------------------------------------
                     */
                    var container_eins = $('<div style="margin: 5px;"></div>')
                    container_eins.appendTo($(information));

                    // var photocolumn = $('<div style="float: left; width: 15%;"></div>');
                    var leftcolumn_eins = $('<div style="float: left; width: 40%;"></div>');
                    var rightcolumn_eins = $('<div style="float: left; width: 45%;"></div>');

                    // container.append(photocolumn);
                    container_eins.append(leftcolumn_eins);
                    container_eins.append(rightcolumn_eins);
                    // var photo = $("<div class='jqx-rc-all' style='margin: 10px;'><b>Photo:</b></div>");
                    // var image = $("<div style='margin-top: 10px;'></div>");
                    // var imgurl = '../../images/' + row.firstname.toLowerCase() + '.png';
                    // var img = $('<img height="60" src="' + imgurl + '"/>');
                    // image.append(img);
                    // image.appendTo(photo);
                    // photocolumn.append(photo);

                    // -- die linke Seite
                    var rowname = row.anrede + ' ' + row.vorname + ' ' + row.nachname;
                    if( row.title.length > 0) {
                        rowname = row.anrede + ' ' + row.title + ' ' + row.vorname + ' ' + row.nachname;
                    }
                    var vorname = "<div style='margin: 10px;'><b>Name:</b> " + rowname + "</div>";
                    var anschrift = "<div style='margin: 10px;'><b>Address:</b> " + row.anschrift + "</div>";
                    var zusatz = "<div style='margin: 10px;'><b>Zusatz:</b> " + row.zusatz + "</div>";

                    $(leftcolumn_eins).append(vorname);
                    $(leftcolumn_eins).append(anschrift);
                    $(leftcolumn_eins).append(zusatz);

                    // -- die rechte Seite
                    var rufname = "<div style='margin: 10px;'><b>Rufname:</b> " + row.rufname + "</div>";
                    var landsmann = "<div style='margin: 10px;'><b>Landsmann:</b> " + row.landsmann + "</div>";
                    var aufgabe = "<div style='margin: 10px;'><b>Aufgabe:</b> " + row.aufgabe + "</div>";

                    $(rightcolumn_eins).append(rufname);
                    $(rightcolumn_eins).append(landsmann);
                    $(rightcolumn_eins).append(aufgabe);




                    /** -----------------------------------------------
                     *   zweites Tab zusammenbauen (komm)
                     * ------------------------------------------------
                     */
                    var container_zwei = $('<div style="margin: 5px;"></div>')
                    container_zwei.appendTo($(komm));

                    var leftcolumn_zwei = $('<div style="float: left; width: 50%;"></div>');
                    var rightcolumn_zwei = $('<div style="float: left; width: 50%;"></div>');

                    container_zwei.append(leftcolumn_zwei);
                    container_zwei.append(rightcolumn_zwei);

                    // -- die linke Seite
                    var email = "<div style='margin: 10px;'><b>Email:</b> " + row.email + "</div>";
                    var www = "<div style='margin: 10px;'><b>www:</b> " + row.www + "</div>";
                    $(leftcolumn_zwei).append(email);
                    $(leftcolumn_zwei).append(www);

                    // -- die rechte Seite
                    for(var i=0; i<row.jtelefon.length; i++){
                        var zhh = row.jtelefon[i];
                        var jtelefon1 = "<div style='margin: 10px;'><b>Tel.:" + zhh.key + ":</b> " + zhh.value + "</div>";
                        $(rightcolumn_zwei).append(jtelefon1);
                    }


                    /** -----------------------------------------------
                     *   drittes Tab zusammenbauen (notes)
                     * ------------------------------------------------
                     */
                    var container_drei = $('<div style="white-space: normal; margin: 5px;"><span>' + row.bemerkung + '</span></div>');
                    $(notes).append(container_drei);

                    // -- Tab anzeigen
                    $(tabsdiv).jqxTabs({ width: 820, height: 130 });
                }
            };




            var dataAdapter = new $.jqx.dataAdapter(source, {
                loadComplete: function (data) {
                    //alert('complete')
                },
                loadError: function (xhr, status, error) {
                    alert('error im \'dataAdapter\'')
                }
            });


            var petacolumns = [
                { text: 'Id', datafield: 'id', width: 50 },
                { text: 'Anrede', datafield: 'anrede', width: 80 },
                { text: 'Vornname', datafield: 'vorname', width: 160 },
                { text: 'Nachname', datafield: 'nachname', width: 160 },
                // { text: 'Rufname', datafield: 'rufname', width: 100, cellsalign: 'center' },
                // { text: 'Zusatz', datafield: 'zusatz', width: 180, cellsalign: 'left' },
                // { text: 'Email', datafield: 'email', width: 130 },
                { text: 'Anschrift', datafield: 'anschrift', width: 350 },
                // { text: 'geb', datafield: 'geb', width: 100, cellsformat: 'dd.MM.yyyy' },
                // { text: 'Landsmann', datafield: 'landsmann', width: 70 },
                // { text: 'Telefon', datafield: 'telefon', width: 50 },
                //{ text: 'JTelefon', datafield: 'jtelefon', width: 50 },
                //{ text: 'JField', datafield: 'jfield', width: 100 },
                {text: 'Aufgabe', datafield: 'aufgabe', width: 150 },
                // { text: 'Bemerkung', datafield: 'bemerkung', width: 200 }
            ]

            var containerInnerRight = null;

            $("#table").jqxDataTable({
                source: dataAdapter,
                sortable: true,
                width: '100%',
                // theme: 'darkblue',
                pageable: true,
                // pageSize: 5,
                // autoheight: true,
                // enabletooltips: true,
                // selectionmode: 'singlerow',
                columnsResize: true,
                rowDetails: true,
                // editable: true,
                showToolbar: true,
                altRows: true,
                pagerButtonsCount: 8,
                toolbarHeight: 35,
                // expand the first details.
                initRowDetails: initRowDetail,
                renderToolbar: function(toolBar)
                {
                    var toTheme = function (className) {
                        if (theme == "") return className;
                        return className + " " + className + "-" + theme;
                    }
                    // appends buttons to the status bar.
                    // -- Äusserer Container
                    var container = $("<div style='overflow: hidden; margin-left: 24px; position: relative; height: 100%; width: 100%;'></div>");

                    // -- Innerer Container
                    var containerInnerLeft = $("<div style='float: left; padding: 2px; margin: 0px; background-color: lightgrey'></div>");
                    var containerInnerRight = $("<div style='float: left; padding: 2px; margin: 0 0 0 30px; background-color: lightgrey'></div>");

                    // ButtonContainer
                    var buttonTemplate = "<div style='float: left; padding: 2px; margin: 0px;'></div>";


                    container.append(containerInnerLeft);
                    container.append(containerInnerRight);

                    // -- Buttons in den ButtonContainer legen
                    var addButton = $(buttonTemplate);
                    var deleteButton = $(buttonTemplate);
                    var editButton = $(buttonTemplate);
                    var pferdButton = $(buttonTemplate);          // ist Pferd, Reitbeteiligung, ...

                    containerInnerLeft.append(addButton);
                    containerInnerLeft.append(deleteButton);
                    containerInnerLeft.append(editButton);
                    // containerInnerRight.append(pferdButton);

                    // -- den äusseren Container in die Toolbar setzen
                    toolBar.append(container);

                    // alert('lll');

                    addButton.jqxButton({ value:"+", cursor: "pointer", enableDefault: false,  height: 25, width: 25 });
                    // addButton.find('div:first').addClass(toTheme('jqx-icon-plus'));
                    // addButton.jqxTooltip({ position: 'bottom', content: "Add"});
                    deleteButton.jqxButton({ value:"-", cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                    // deleteButton.find('div:first').addClass(toTheme('jqx-icon-delete'));
                    // deleteButton.jqxTooltip({ position: 'bottom', content: "Delete"});
                    editButton.jqxButton({ value:"edit", cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 45 });
                    // editButton.find('div:first').addClass(toTheme('jqx-icon-edit'));
                    // editButton.jqxTooltip({ position: 'bottom', content: "Edit"});


                    // pferdButton.jqxButton({ value:'buttAufgaben', cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 75 });
                    // pferdButton.find('div:first').addClass(toTheme('jqx-icon-save'));
                    // pferdButton.jqxTooltip({ position: 'bottom', content: "Save Changes"});




                    var updateButtons = function (action) {
                        switch (action) {
                            case "Select":
                                addButton.jqxButton({ disabled: false });
                                deleteButton.jqxButton({ disabled: false });
                                editButton.jqxButton({ disabled: false });
                                // cancelButton.jqxButton({ disabled: true });
                                pferdButton.jqxButton({ disabled: true });
                                break;
                            case "Unselect":
                                addButton.jqxButton({ disabled: false });
                                deleteButton.jqxButton({ disabled: true });
                                editButton.jqxButton({ disabled: true });
                                // cancelButton.jqxButton({ disabled: true });
                                pferdButton.jqxButton({ disabled: true });
                                break;
                            case "Edit":
                                addButton.jqxButton({ disabled: true });
                                deleteButton.jqxButton({ disabled: true });
                                editButton.jqxButton({ disabled: true });
                                // cancelButton.jqxButton({ disabled: false });
                                pferdButton.jqxButton({ disabled: false });
                                break;
                            case "End Edit":
                                addButton.jqxButton({ disabled: false });
                                deleteButton.jqxButton({ disabled: false });
                                editButton.jqxButton({ disabled: false });
                                // cancelButton.jqxButton({ disabled: true });
                                pferdButton.jqxButton({ disabled: true });
                                break;
                        }
                    }
                    var rowIndex = null;

                    $("#table").on('rowSelect', function (event) {
                        var args = event.args;
                        var row = args.row;
                        var buttAufgaben = row['aufgabe'];
                        // containerInnerRight.child.addListener()     // inhalt löschen ??
                        // var pferdButton = $(buttonTemplate);
                        pferdButton.jqxButton({ value:buttAufgaben, cursor: "pointer", disabled: false, enableDefault: false,  height: 25, width: 25 });
                        // updateButton2.jqxButton({ value:'buttAufgaben', cursor: "pointer", disabled: false, enableDefault: false,  height: 25, width: 25 });
                        containerInnerRight.append(pferdButton);
                        // containerInnerRight.append(updateButton2);


                        // alert(buttAufgaben)

                        updateButtons('Select');
                    });
                    $("#table").on('rowUnselect', function (event) {
                        updateButtons('Unselect');
                    });
                    $("#table").on('rowEndEdit', function (event) {
                        updateButtons('End Edit');
                    });
                    $("#table").on('rowBeginEdit', function (event) {
                        updateButtons('Edit');
                    });
                    addButton.click(function (event) {
                        if (!addButton.jqxButton('disabled')) {
                            // add new empty row.
                            $("#table").jqxDataTable('addRow', null, {}, 'first');
                            // select the first row and clear the selection.
                            $("#table").jqxDataTable('clearSelection');
                            $("#table").jqxDataTable('selectRow', 0);
                            // edit the new row.
                            $("#table").jqxDataTable('beginRowEdit', 0);
                            updateButtons('add');
                        }
                    });
                    // cancelButton.click(function (event) {
                    //     if (!cancelButton.jqxButton('disabled')) {
                    // --- cancel changes.
                            // $("#table").jqxDataTable('endRowEdit', rowIndex, true);
                        // }
                    // });
                    // updateButton.click(function (event) {
                    //     if (!updateButton.jqxButton('disabled')) {
                    // --- save changes.
                            // $("#table").jqxDataTable('endRowEdit', rowIndex, false);
                        // }
                    // });
                    editButton.click(function () {
                        if (!editButton.jqxButton('disabled')) {
                            $("#table").jqxDataTable('beginRowEdit', rowIndex);
                            updateButtons('edit');
                        }
                    });
                    deleteButton.click(function () {
                        if (!deleteButton.jqxButton('disabled')) {
                            $("#table").jqxDataTable('deleteRow', rowIndex);
                            updateButtons('delete');
                        }
                    });
                },

                ready: function () {
                    // -- called when the DataTable is loaded.
                    // $("#table").jqxDataTable('showDetails', 0);

                    /* init jqxWindow widgets. */
                    // $("#ID").jqxInput({disabled: false, width: 150, height: 30 });
                    // $("#freight").jqxNumberInput({ spinButtons: true, inputMode: 'simple', width: 150, height: 30 });
                    // var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
                    // $("#anrede").jqxInput({source: anrede, width: 150, height: 30 });
                    // $("#shipDate").jqxDateTimeInput({ formatString: 'd', width: 150, height: 30 });
                    // $("#save").jqxButton({ height: 30, width: 80 });
                    // $("#cancel").jqxButton({ height: 30, width: 80 });
                    // $("#cancel").mousedown(function () {
                    //     /* close jqxWindow. */
                    //     $("#dialog").jqxWindow('close');
                    // });
                    // $("#save").mousedown(function () {
                    //     /* close jqxWindow. */
                    //     $("#dialog").jqxWindow('close');
                    //     // update edited row.
                    //     var editRow = parseInt($("#dialog").attr('data-row'));
                    //     var rowData = {
                    //         OrderID: $("#orderID").val(), Freight: $("#freight").val(),
                    //         ShipCountry: $("#shipCountry").val(), ShippedDate: $("#shipDate").val()
                    //     };
                    //     $("#table").jqxDataTable('updateRow', editRow, rowData);
                    // });
                    // $("#dialog").on('close', function () {
                    //     /* enable jqxDataTable. */
                    //     $("#table").jqxDataTable({ disabled: false });
                    // });
                    $("#dialog").jqxWindow({
                        resizable: false,
                        position: { left: $("#table").offset().left + 75, top: $("#table").offset().top + 35 },
                        width: 270, height: 230,
                        autoOpen: false
                    });
                    // $("#dialog").css('visibility', 'visible');
                },


                columns: petacolumns
            });

            $("#table").on('rowDoubleClick', function (event) {
                var args = event.args;
                var index = args.index;
                var row = args.row;
                alert('$("#table").on(\'rowDoubleClick\'...');
                // update the widgets inside jqxWindow.
                $("#dialog").jqxWindow('setTitle', "Edit Row: " + row.id);
                $("#dialog").jqxWindow('open');
                $("#dialog").attr('data-row', index);
                $("#table").jqxDataTable({ disabled: true });
                // $("#ID").val(row.ID);
                $("#anrede").val(row.anrede);
                $("#vorname").val(row.vorname);
                // $("#shipDate").val(row.ShippedDate);
            });

//             // create context menu
//             var contextMenu = $("#Menu").jqxMenu({ width: 200, autoOpenPopup: false, mode: 'popup'});
//             $('#jqxgrid').on('contextmenu', function () {
//                 return false;
//             });
//
//             // handle context menu clicks.
//             $("#Menu").on('itemclick', function (event) {
//                 var args = event.args;
//                 var rowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
//                 if ($.trim($(args).text()) == "Edit Selected Row") {
//                     editrow = rowindex;
//                     var offset = $("#jqxgrid").offset();
//                     $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60} });
//                     // get the clicked row's data and initialize the input fields.
//                     var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
//                     $("#anrede").val(dataRecord.anrede);
//                     $("#vorname").val(dataRecord.vorname);
//                     $("#nachname").val(dataRecord.nachname);
//                     $("#rufname").val(dataRecord.rufname);
//                     //$("#quantity").jqxNumberInput({ decimal: dataRecord.quantity });
//                     //$("#price").jqxNumberInput({ decimal: dataRecord.price });
//                     // show the popup window.
//                     $("#popupWindow").jqxWindow('show');
//                 }
//                 else {
//                     var rowid = $("#jqxgrid").jqxGrid('getrowid', rowindex);
//                     $("#jqxgrid").jqxGrid('deleterow', rowid);
//                 }
//             });
//             $("#jqxgrid").on('rowclick', function (event) {
//                 if (event.args.rightclick) {
//                     $("#jqxgrid").jqxGrid('selectrow', event.args.rowindex);
//                     var scrollTop = $(window).scrollTop();
//                     var scrollLeft = $(window).scrollLeft();
//                     contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
//                     return false;
//                 }
//             });
//
//             // initialize the popup window and buttons.
//             $("#popupWindow").jqxWindow({ width: 450, height: 400, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01 });
//             $("#Cancel").jqxButton({ theme: theme });
//             $("#Save").jqxButton({ theme: theme });
//             // update the edited row when the user clicks the 'Save' button.
//             $("#Save").click(function () {
//                 if (editrow >= 0) {
//                     var row = { firstname: $("#firstName").val(), lastname: $("#lastName").val(), productname: $("#product").val(),
//                         quantity: parseInt($("#quantity").jqxNumberInput('decimal')), price: parseFloat($("#price").jqxNumberInput('decimal'))
//                     };
//                     var rowid = $("#jqxgrid").jqxGrid('getrowid', editrow);
//                     $('#jqxgrid').jqxGrid('updaterow', rowid, row);
//                     $("#popupWindow").jqxWindow('hide');
//                 }
//             });
// 2
//
//             //$("#jqxgrid").jqxGrid({ disabled: true});
//
//             var rowindex = 0;
//
//             //$("#jqxgrid").jqxGrid('selectrow', -1);
//
//             $("#jqxgrid").on('rowselect', function (event) {
//                 rowindex = event.args.rowindex;
//             });
//
//
//             /*
//             $("#jqxgrid").on("rowclick", function () {
//                 $("body").append("rowclick <br />");
//             });
//             */
//             $("#jqxgrid").on("rowdoubleclick", function () {
//                 $("body").append("rowdoubleclick <br />");
//                 var shh = $('#jqxgrid').jqxGrid('getrowdata', rowindex);
//                 $("body").append(shh['id'] + "<br />");
//             });
//             /*
//             $("#jqxgrid").on("celldoubleclick", function () {
//                 $("body").append("celldoubleclick <br />");
//             });
//             */

        });
    </script>

@endpush

@push('scripts')
    <!-- <script src="/js/app.js"></script> -->
    <script></script>
@endpush

@section('sidebar')
    @parent
    <p>larahorse resources views stammdaten puser index.blade.php</p>
@endsection

@section('content')
    @parent

    <a href="#" class="btnadd"> add </a>

    <p class="lead">
        Form: stammdaten puser
    </p>

    <br>
    <input type="button" value="Click Me" id="jqxbutton" />

    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; ">
        <div id="table"></div>

{{--        <div style="margin-top: 30px;">--}}
{{--            <div id="cellbegineditevent"></div>--}}
{{--            <div style="margin-top: 10px;" id="cellendeditevent"></div>--}}
{{--        </div>--}}

        <div style="visibility: hidden;" id="dialog">
            <div>Edit Dialog</div>
            <div style="overflow: hidden;">
                <table style="table-layout: fixed; border-style: none;">
                    <tr>
                        <td align="right">ID:</td>
                        <td align="left">
                            <input id="ID" type="text" readonly="true" disabled="disabled" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Anrede:</td>
                        <td align="left"><input id="anrede" /></td>
                    </tr>
                    <tr>
                        <td align="right">Vorname:</td>
                        <td align="left"><input id="vorname" /></td>
                    </tr>
                    <tr>
                        <td align="right">Name:</td>
                        <td align="left"><input id="nachname" /></td>
                    </tr>
{{--                    <tr>--}}
{{--                        <td align="right">Rufname:</td>--}}
{{--                        <td align="left"><input id="rufname" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">Zusatz:</td>--}}
{{--                        <td align="left"><input id="zusatz" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">Email:</td>--}}
{{--                        <td align="left"><input id="email" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">www:</td>--}}
{{--                        <td align="left"><input id="www" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">Anschrift:</td>--}}
{{--                        <td align="left"><input id="anschrift" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">geboren:</td>--}}
{{--                        <td align="left"><input id="geb" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">Landsmann:</td>--}}
{{--                        <td align="left"><input id="landsmann" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">JTelefon:</td>--}}
{{--                        <td align="left"><input id="jtelefon" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">JField:</td>--}}
{{--                        <td align="left"><input id="jfield" /></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">Bemerkung:</td>--}}
{{--                        <td align="left"><input id="bemerkung" /></td>--}}
{{--                    </tr>--}}
                    <tr>
                        <td align="right"></td>
{{--                        <td style="padding-top: 10px;" align="right">--}}
{{--                            <input style="margin-right: 5px;" id="Save" type="button" value="Save" />--}}
{{--                            <input id="Cancel" type="button" value="Cancel" />--}}
{{--                        </td>--}}

                        <td>
                            <button id="save">Save</button>
                            <button style="margin-left: 5px;" id="cancel">Cancel
                        </button>
                        </td>


                    </tr>
                </table>
            </div>
        </div>

    </div>

@endsection

