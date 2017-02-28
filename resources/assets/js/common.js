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