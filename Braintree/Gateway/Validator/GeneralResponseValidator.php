<?php
namespace XXXX\Braintree\Gateway\Validator;

use Braintree\Result\Error;
use Braintree\Result\Successful;
use Magento\Payment\Gateway\Validator\AbstractValidator;
use Magento\Braintree\Gateway\Helper\SubjectReader;
use Magento\Payment\Gateway\Validator\ResultInterface;
use Magento\Payment\Gateway\Validator\ResultInterfaceFactory;

class GeneralResponseValidator extends AbstractValidator
{
    /**
     * @var SubjectReader
     */
    protected $subjectReader;

    /**
     * Constructor
     *
     * @param ResultInterfaceFactory $resultFactory
     * @param SubjectReader $subjectReader
     */
    public function __construct(
        ResultInterfaceFactory $resultFactory,
        SubjectReader $subjectReader
    ) {
        parent::__construct($resultFactory);
        $this->subjectReader = $subjectReader;
    }

    /**
     * @inheritdoc
     */
    public function validate(array $validationSubject): ResultInterface
    {
        $isValid = true;
        $errorMessages = [];
        return $this->createResult($isValid, $errorMessages);
    }

    /**
     * @return array
     */
    protected function getResponseValidators(): array
    {
        return [
            static function ($response) {
                return [
                    property_exists($response, 'success') && $response->success === true,
                    [__('Braintree error response.')]
                ];
            }
        ];
    }
}
