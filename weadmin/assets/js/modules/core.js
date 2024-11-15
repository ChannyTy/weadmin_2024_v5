export const strrev = s => s.length>1 ? s.at(-1)+strrev(s.slice(0,-1)) : s;

export const str_rot13 = (str) => {
    return str.replace(/[a-zA-Z]/g, function(c) {
        return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
    });
}

export const parseQueryString = (queryString) => {
    let params = {};
    let queryStringWithoutQuestionMark = queryString.replace('?', '');

    let keyValuePairs = queryStringWithoutQuestionMark.split('&');
    keyValuePairs.forEach(pair => {
        let parts = pair.split('=');
        let key = decodeURIComponent(parts[0]);
        let value = decodeURIComponent(parts.slice(1).join('='));

        if (!params[key]) {
            params[key] = value;
        } else if (Array.isArray(params[key])) {
            params[key].push(value);
        } else {
            params[key] = [params[key], value];
        }
    });

    return params;
}

export const encodeStr = (variable) => {
    let key = "xitgmLwmp";
    let index = 0;
    let temp = "";
    variable = variable.toString(); // convert any to string
    variable = variable.replace("=", "?O");
    for (let i = 0; i < variable.length; i++) {
        temp = temp + `${variable[i]}${key[index]}`
        index++;
        if (index >= key.length) {
            index = 0;
        }
    }
    variable = strrev(temp); // reverse string
    variable = btoa(variable); // base64 encode
    variable = encodeURIComponent(variable); // encode url
    variable = str_rot13(variable); // convert type of string
    variable = variable.replace("%", "WewEb");
    return variable
}

export const decodeStr = (enVariable) => {
    enVariable = enVariable.replace("%", "WewEb");
    enVariable = str_rot13(enVariable); // convert type of string
    enVariable = encodeURIComponent(enVariable); // encode url
    enVariable = atob(enVariable); // base64 encode
    enVariable = strrev(enVariable); // reverse string
    let current = 0;
    let temp = "";
    for (let i = 0; i < enVariable.length; i++) {
        if (current % 2 == 0) {
            temp = temp + enVariable[i];
        }
        current++;
    }
    temp = temp.replace("?O", "=");
    temp = Object.keys(parseQueryString(temp)).join(""); // implode key
    console.log(temp);
}
