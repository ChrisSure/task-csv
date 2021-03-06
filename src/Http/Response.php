<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:26
 */

namespace Base\Http;

/**
 * Class Response
 * @package Base\Http
 */
class Response implements ResponseInterface
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var array
     */
    private $reasonPhrase = [
        // INFORMATIONAL CODES
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        // SUCCESS CODES
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        // REDIRECTION CODES
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Switch Proxy', // Deprecated to 306 => '(Unused)'
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        // CLIENT ERROR
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        444 => 'Connection Closed Without Response',
        451 => 'Unavailable For Legal Reasons',
        // SERVER ERROR
        499 => 'Client Closed Request',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
        599 => 'Network Connect Timeout Error',
    ];

    /**
     * @var array
     */
    private $headers = [];

    /**
     * Response constructor.
     * @param $body
     * @param int $statusCode
     */
    public function __construct($body, $statusCode = 200)
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
    }

    /**
     * Emit response
     * @return void
     */
    public function emit(): void
    {
        $this->initAppHeader();
        echo $this->getBody();
    }

    /**
     * Get body
     * @return String
     */
    public function getBody(): String
    {
        return $this->body;
    }

    /**
     * Get status code
     * @return Int
     */
    public function getStatusCode(): Int
    {
        return $this->statusCode;
    }

    /**
     * Get reason phrase
     * @return String
     */
    public function getReasonPhrase(): String
    {
        return $this->reasonPhrase[$this->statusCode];
    }

    /**
     * Get header
     * @param String $name
     * @return mixed|null
     */
    public function getHeader(String $name)
    {
        return (isset($this->headers[$name])) ? $this->headers[$name] : null;
    }

    /**
     * Get headers
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Has header
     * @param $name
     * @return bool
     */
    public function hasHeader($name): bool
    {
        return (isset($this->headers[$name])) ? true : false;
    }

    /**
     * Set header
     * @param String $name
     * @param $value
     * @return $this
     */
    public function setHeader(String $name, $value): self
    {
        $new = clone $this;
        if ($new->hasHeader($name)) {
            unset($new->headers[$name]);
        }
        $new->headers[$name] = $value;
        return $new;
    }

    /**
     * Init headers response
     */
    private function initAppHeader(): void
    {
        header('HTTP/1.1 ' . $this->getStatusCode() . ' ' . $this->getReasonPhrase());
        foreach ($this->getHeaders() as $name => $value) {
            header($name . ':' . $value);
        }
    }
}