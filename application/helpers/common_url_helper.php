<?php

if (!function_exists("admin")) {

    function admin($uri = '') {
        $url = base_url("admin-panel/" . $uri);
        return $url;
    }

}
if (!function_exists("shot_link")) {

    function shot_link($uri = '') {
        $url = base_url("user/" . $uri);
        return $url;
    }

}

/**
 * Remove a query string parameter from an URL.
 *
 * @param string $string
 * @param string $varname
 *
 * @return string
 */
function removeQueryStringParameter($string, $varname) {
    $query = '';
    parse_str($string, $query);
    unset($query[$varname]);
    $queryStr = !empty($query) ? '?' . http_build_query($query) : '';
    return $queryStr;
}

if (!function_exists("removeUrlQuery")) {

    /**
     * @param string $url Url with query string.
     * @parma array $query Array of new query string. 
     */
    function removeUrlQuery($url, $query = array()) {
        $parsedUrl = parse_url($url);
        $parsedUrl['query'] = implode('&', array_map(function ($v, $k) {
                    return $k . '=' . $v;
                }, $query, array_keys($query)));
        $newUrl = buildUrlFromArray($parsedUrl, FALSE);
        if ($query) {
            $newUrl = $newUrl;
        } else {
            $newUrl = substr($newUrl, 0, -1);
        }
        return $newUrl;
    }

}
if (!function_exists("buildUrlFromArray")) {

    /**
     * @param array $parts Array of Parsed Url
     * @param boolen $encode If this set to false it will return decoded url else returns encoded. Default is : TRUE
     */
    function buildUrlFromArray($parts, $encode = TRUE) {
        if ($encode) {
            if (isset($parts['user'])) {
                $parts['user'] = rawurlencode($parts['user']);
            }
            if (isset($parts['pass'])) {
                $parts['pass'] = rawurlencode($parts['pass']);
            }
            if ((isset($parts['host']) && !preg_match('!^(\[[\da-f.:]+\]])|([\da-f.:]+)$!ui', $parts['host']))) {
                $parts['host'] = rawurlencode($parts['host']);
            }
            if (!empty($parts['path'])) {
                $parts['path'] = preg_replace('!%2F!ui', '/', rawurlencode($parts['path']));
            }
            if (isset($parts['query'])) {
                $parts['query'] = rawurlencode($parts['query']);
            }
            if (isset($parts['fragment'])) {
                $parts['fragment'] = rawurlencode($parts['fragment']);
            }
        }
        $url = '';
        if (!empty($parts['scheme'])) {
            $url .= $parts['scheme'] . ':';
        }
        if (isset($parts['host'])) {
            $url .= '//';
            if (isset($parts['user'])) {
                $url .= $parts['user'];
                if (isset($parts['pass'])) {
                    $url .= ':' . $parts['pass'];
                }
                $url .= '@';
            }
            if (preg_match('!^[\da-f]*:[\da-f.:]+$!ui', $parts['host'])) {
                $url .= '[' . $parts['host'] . ']'; // IPv6
            } else {
                $url .= $parts['host'];             // IPv4 or name
            }
            if (isset($parts['port'])) {
                $url .= ':' . $parts['port'];
            }
            if (!empty($parts['path']) && $parts['path'][0] != '/') {
                $url .= '/';
            }
        }
        if (!empty($parts['path'])) {
            $url .= $parts['path'];
        }
        if (isset($parts['query'])) {
            $url .= '?' . $parts['query'];
        }
        if (isset($parts['fragment'])) {
            $url .= '#' . $parts['fragment'];
        }
        return $url;
    }

}


if (!function_exists("ping")) {

    /**
     * @param string $domain 
     */
    function ping($domain) {
        //check, if a valid url is provided
        if (!filter_var($domain, FILTER_VALIDATE_URL)) {
            return false;
        }

        //initialize curl
        $curlInit = curl_init($domain);
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

        //get answer
        $response = curl_exec($curlInit);

        curl_close($curlInit);

        if ($response) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists("remoteFileExists")) {

    /**
     * @param string $url 
     */
    function remoteFileExists($url) {
        $curl = curl_init($url);

        //don't fetch the actual page, you only want to check the connection is ok
        curl_setopt($curl, CURLOPT_NOBODY, true);

        //do request
        $result = curl_exec($curl);

        $ret = false;

        //if request did not fail
        if ($result !== false) {
            //if request was ok, check response code
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($statusCode == 200) {
                $ret = true;
            }
        }

        curl_close($curl);

        return $ret;
    }

}
