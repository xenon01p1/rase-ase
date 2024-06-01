
function button(color, text){
    let html = `
        <a href="#a">
            <button type="button" class="btn ${color}  btn-sm radius-5 px-2">${text}</button>
        </a>
    `;
    return html;
}

function display_status(text_color, bg_color, text){
    let html = `
        <td>
            <div align="center">
                <div class="badge  ${text_color} ${bg_color} p-2 text-uppercase px-3">
                    <i class='bx bxs-circle align-middle me-1'></i>
                    ${text}
                </div>
            </div>
        </td>
    `;
    return html;
}

function base_action(id, edit_button=true, delete_button=true, preview_files=false) {
    let html = '<td><div class="d-flex order-actions">';
    edit_button ? html += `<a onclick="edit_data('${id}')" class="" style="cursor:pointer;"><i class="bx bxs-edit"></i></a>` : '';
    delete_button ? html += `<a onclick="delete_data('${id}')" class="ms-3" style="cursor:pointer;"><i class="bx bxs-trash"></i></a>` : '';
    preview_files ? html += `<a onclick="preview_data('${id}')" class="ms-3" style="cursor:pointer;"><i class="bx bxs-image"></i></a>` : '';
    html += '</div></td>';

    return html;
}

function verified(status){
    let html = '';

    if(status){
        html = ` <i class='bx bxs-check-circle ' ></i> `;
    }

    return html;
}

function multiline_cell_text(text1, text2, text3=''){
    text1 = text1 ? text1 : '';
    text2 = text2 ? text2 : '';
    text3 = text3 ? text3 : '';

    let html = `
        ${text1}<br>
        ${text2}<br>
        ${text3}<br>
    `;
    return html;
}

function unknown_day(){
    let html = `
    <br style="height: 5px; display: block; content: '';">
    -
    `;
    return html;
}

function documents(customer_code, doc1, doc1_status, doc2, doc2_status, doc3, doc3_status, doc4, doc4_status){
    let doc1_color = doc1_status ? 'btn-success' : 'btn-outline-dark';
    let doc2_color = doc2_status ? 'btn-success' : 'btn-outline-dark';
    let doc3_color = doc3_status ? 'btn-success' : 'btn-outline-dark';
    let doc4_color = doc4_status ? 'btn-success' : 'btn-outline-dark';

    let doc1_action = doc1_status ? `${doc1.toLowerCase()}_view` : `${doc1.toLowerCase()}_add`;

    let html = `
    <td>
        <div align="center">
            <a onclick="${doc1_action}('${customer_code}')">
                <button type="button" class="btn   ${doc1_color}  btn-sm radius-5 px-2">${doc1}</button>
            </a>
            <a onclick="#a">
            <button type="button" class="btn  ${doc2_color}  btn-sm radius-5 px-2">${doc2}</button>
            </a>
            <br style="height: 5px; display: block; content: '';">
            <a onclick="#a">
            <button type="button" class="btn  ${doc3_color}  btn-sm radius-5 px-2">${doc3}</button>
            </a>
            <a onclick="#a">
            <button type="button" class="btn  ${doc4_color}  btn-sm radius-5 px-2">${doc4}</button>
            </a>
        </div> 
    </td>
    `;
    return html;
}

function top_text_bottom_btn(top_text, btn_text, btn_bg){
    let html = `<div align="center">
                    ${top_text}
                <br style="height: 5px; display: block; content: '';">
                <a href="#a">
                    <button type="button" class="btn  ${btn_bg} btn-sm radius-5 px-3">${btn_text}</button>
                </a> 
                </div> `;
    return html;
}

function top_text_bottom_status_badge(top_text, text_color, btn_text, btn_bg){
    let html = `<div align="center"> 
                    ${top_text}
                    <br style="height: 5px; display: block; content: '';">
                    <div class="badge  ${text_color} ${btn_bg} p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>${btn_text}</div> 
                </div>`;
    return html;
}

function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    var formatted = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + formatted;
}

function formatDate(dateString) {
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    
    // Parse the input dateString into a Date object
    const date = new Date(dateString);
    
    const day = date.getDate();
    const monthIndex = date.getMonth();
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    
    const month = months[monthIndex]; // Format the month name
    const timeZoneAbbr = "WIB";
    const formattedDate = `${day} ${month} ${year}, ${hours}:${minutes} ${timeZoneAbbr}`;
    
    return formattedDate;
}