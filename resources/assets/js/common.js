/**
 * Returns the path with the params embeded.
 *
 * @param routeName
 * @param params
 * @returns {string}
 */
App.route = function (routeName, params) {
    let path = '/' + App.routes[routeName];

    if (params !== undefined) {
        for (var param in params) {
            if (params.hasOwnProperty(param)) {
                path = path.replace('{' + param + '}', params[param]);
            }
        }
    }

    return path;
};

/**
 * Returns the translation for the textName in the language lang.
 *
 * @param textName
 * @param lang
 * @returns {string}
 */
App.text = function (textName, params, lang) {
    if(lang === undefined){
        lang = App.config.locale;
    }
    let text = App.texts[lang][textName];

    if (params !== undefined) {
        for (var param in params) {
            if (params.hasOwnProperty(param)) {
                text = text.replace(':' + param, params[param]);
            }
        }
    }

    return text;
};

