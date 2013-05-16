<?php namespace ConnectWiseApi;

use SoapFault,
    ConnectWiseApi\ApiResource,
    ConnectWiseApi\ApiRequestParams,
    ConnectWiseApi\ApiResult,
    ConnectWiseApi\ApiException;

class Configuration
{
    /**
     * The API name for the SOAP connection
     *
     * @var string
     */
    protected static $currentApi = 'ConfigurationAPI';

    /**
     * Add a new configuration
     *
     * @throws ApiException
     * @param array $config
     * @return array
     */
    public static function addConfiguration(array $config)
    {
        ApiRequestParams::set('configuration', $config);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->AddConfiguration(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'AddConfigurationResult');
            
            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Add a new configuration type
     *
     * @throws ApiException
     * @param array $configType
     * @return array
     */
    public static function addConfigurationType(array $configType)
    {
        ApiRequestParams::set('configurationType', $configType);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->AddConfigurationType(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'AddConfigurationTypeResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Adds or updates a configuration
     *
     * @throws ApiException
     * @param array $config
     * @return array
     */
    public static function addOrUpdateConfiguration(array $config)
    {
        ApiRequestParams::set('configuration', $config);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->AddOrUpdateConfiguration(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'AddOrUpdateConfigurationResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Adds or updates a configuration type
     *
     * @throws ApiException
     * @param array $configType
     * @return array
     */
    public static function addOrUpdateConfigurationType(array $configType)
    {
        ApiRequestParams::set('configurationType', $configType);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->AddOrUpdateConfigurationType(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'AddOrUpdateConfigurationTypeResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Finds configuration types
     *
     * @throws ApiException
     * @param integer $limit
     * @param integer $skip
     * @param mixed string $conditions
     * @param string $orderBy
     * @return array
     */
    public static function findConfigurationTypes($limit = 0, $skip = 0, $conditions = '', $orderBy = '')
    {
        if (is_int($limit) === false)
        {
            throw new ApiException('Limit value must be an integer.');
        }

        if (is_int($skip) === false)
        {
            throw new ApiException('Skip value must be an integer.');
        }

        if (is_string($conditions) === false)
        {
            throw new ApiException('Conditions must be a string.');
        }

        if (is_string($orderBy) === false)
        {
            throw new ApiException('Order by must be a string.');
        }

        ApiRequestParams::set('limit', $limit);
        ApiRequestParams::set('skip', $skip);
        ApiRequestParams::set('conditions', $conditions);
        ApiRequestParams::set('orderBy', $orderBy);

        try
        {
            $findResults = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->FindConfigurationTypes(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($findResults->FindConfigurationTypesResult, 'ConfigurationTypeFindResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Find configurations
     *
     * @throws ApiException
     * @param integer $limit
     * @param integer $skip
     * @param mixed string $conditions
     * @param string $orderBy
     * @return array
     */
    public static function findConfigurations($limit = 0, $skip = 0, $conditions = '', $orderBy = '')
    {
        if (is_int($limit) === false)
        {
            throw new ApiException('Limit value must be an integer.');
        }

        if (is_int($skip) === false)
        {
            throw new ApiException('Skip value must be an integer.');
        }

        if (is_string($conditions) === false)
        {
            throw new ApiException('Conditions must be a string.');
        }

        if (is_string($orderBy) === false)
        {
            throw new ApiException('Order by must be a string.');
        }

        ApiRequestParams::set('limit', $limit);
        ApiRequestParams::set('skip', $skip);
        ApiRequestParams::set('conditions', $conditions);
        ApiRequestParams::set('orderBy', $orderBy);

        try
        {
            $findResults = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->FindConfigurations(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($findResults->FindConfigurationsResult, 'ConfigurationFindResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Gets a count of available configurations. Optionally filters by the supplied conditions.
     *
     * @throws ApiException
     * @param boolean $isOpen
     * @param string $conditions
     * @return array
     */
    public static function findConfigurationsCount($isOpen = false, $conditions = '')
    {
        if (is_bool($isOpen) === false)
        {
            throw new ApiException('Is Open param must be boolean.');
        }

        if (is_string($conditions) === false)
        {
            throw new ApiException('Conditions must be a string.');
        }

        ApiRequestParams::set('conditions', $conditions);
        ApiRequestParams::set('isOpen', $isOpen);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->FindConfigurationsCount(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'FindConfigurationsCountResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Gets a configuration by database record id. 
     * If no configuration exists with the given id, an empty array is returned
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function getConfiguration($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('Configuration ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->GetConfiguration(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'GetConfigurationResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Gets a configuration type by database record id. 
     * If no configuration exists with the given id, an empty array is returned
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function getConfigurationType($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('ConfigurationType ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->GetConfigurationType(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'GetConfigurationTypeResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Gets a configuration by database record id. 
     * If no configuration exists with the given id, an exception (SoapFault) is thrown
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function loadConfiguration($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('Configuration ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->LoadConfiguration(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'LoadConfigurationResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Gets a configuration type by database record id. 
     * If no configuration exists with the given id, an exception (SoapFault) is thrown
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function loadConfigurationType($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('ConfigurationType ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->LoadConfigurationType(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'LoadConfigurationTypeResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Update an existing configuration
     *
     * @throws ApiException
     * @param array $configuration
     * @return array
     */
    public static function updateConfiguration(array $configuration)
    {
        ApiRequestParams::set('configuration', $configuration);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->UpdateConfiguration(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'UpdateConfigurationResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Updates an existing configuration type
     *
     * @throws ApiException
     * @param array $configurationType
     * @return array
     */
    public static function updateConfigurationType(array $configurationType)
    {
        ApiRequestParams::set('configurationType', $configurationType);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->UpdateConfigurationType(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'UpdateConfigurationTypeResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Delete an existing configuration
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function deleteConfiguration($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('Configuration ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->DeleteConfiguration(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'DeleteConfigurationResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Deletes an existing configuration type
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function deleteConfigurationType($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('ConfigurationType ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->DeleteConfigurationType(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'DeleteConfigurationTypeResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Deletes a question from an existing configuration type
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function deleteConfigurationTypeQuestion($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('ConfigurationTypeQuestion ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->DeleteConfigurationTypeQuestion(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'DeleteConfigurationTypeQuestionResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }

    /**
     * Deletes a possible response from an existing configuration type question
     *
     * @throws ApiException
     * @param integer $id
     * @return array
     */
    public static function deletePossibleResponse($id)
    {
        if (is_int($id) === false)
        {
            throw new ApiException('PossibleResponse ID must be an integer.');
        }

        ApiRequestParams::set('id', $id);

        try
        {
            $results = ApiResource::run('api_connection', 'start', static::$currentApi)
                ->DeletePossibleResponse(ApiRequestParams::getAll());

            ApiResult::addResultFromObject($results, 'DeletePossibleResponseResult');

            return ApiResult::getAll();
        }
        catch (SoapFault $error)
        {
            throw new ApiException($error->getMessage());
        }
    }
}