<?php namespace Config;

use App\Services\Repositories\RepositoryInterface;
use CodeIgniter\Config\Services as CoreServices;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends CoreServices
{

	    public static function TaskRepository($getShared = false) : RepositoryInterface
	    {
            $taskModel = new \App\Models\Task();
            $validation = \Config\Services::validation();
            if ($getShared)
	        {
	            return static::getSharedInstance('TaskRepository');
	        }

	        return new \App\Services\Repositories\TaskRepository($taskModel, $validation);
	    }

	    public static function CategoryRepository($getShared = false) : RepositoryInterface
	    {
            $categoryModel = new \App\Models\Category();
            if ($getShared)
	        {
	            return static::getSharedInstance('CategoryRepository');
	        }

	        return new \App\Services\Repositories\CategoryRepository($categoryModel);
	    }

	    public static function PersonRepository($getShared = false) : RepositoryInterface
	    {
            $personModel = new \App\Models\Person();
            if ($getShared)
	        {
	            return static::getSharedInstance('CategoryRepository');
	        }

	        return new \App\Services\Repositories\PersonRepository($personModel);
	    }
}
