addEventListener("loadend")
function selectAndDeselect(element_id) {
    
    if (document.getElementById(element_id).classList.contains('light-blue')) {
        document.getElementById(element_id).classList.remove('light-blue');
        document.getElementById(element_id).classList.remove('accent-4');
        document.getElementById(element_id+'_p').classList.remove('white-text');
                
    }
    else{
        document.getElementById(element_id).classList.add('light-blue');
        document.getElementById(element_id).classList.add('accent-4');
        document.getElementById(element_id+'_p').classList.add('white-text');
    }
}