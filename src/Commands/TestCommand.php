<?php

class TestCommand
{
    public function execute()
    {
        echo "Running project tests...\n";

        // Path to the test directory
        $testDir = __DIR__ . '/../Tests';

        // Checking if there is a directory with tests
        if (!is_dir($testDir)) {
            echo "Test directory not found.\n";
            return;
        }

        // Getting a list of test files
        $testFiles = glob($testDir . '/*.php');

        if (empty($testFiles)) {
            echo "No tests found.\n";
            return;
        }

        // Variable for storing test results
        $results = [
            'passed' => 0,
            'failed' => 0,
        ];

        // Execution of each test
        foreach ($testFiles as $testFile) {
            echo "Running test: " . basename($testFile) . "\n";
            
            // Enabling the test file
            try {
                require_once $testFile;

                /// Checking whether the test class is defined
                $testClass = basename($testFile, '.php');
                if (!class_exists($testClass)) {
                    echo "Test class '$testClass' not found in file $testFile.\n";
                    $results['failed']++;
                    continue;
                }

                // Creating an instance of a test class and running the test
                $testInstance = new $testClass();
                if (method_exists($testInstance, 'run')) {
                    $testInstance->run();
                    echo "Test passed.\n";
                    $results['passed']++;
                } else {
                    echo "Test method 'run' not found in class '$testClass'.\n";
                    $results['failed']++;
                }
            } catch (Exception $e) {
                echo "Test failed with error: " . $e->getMessage() . "\n";
                $results['failed']++;
            }

            echo "\n";
        }

        // Output of test results
        echo "Test Results:\n";
        echo "Passed: " . $results['passed'] . "\n";
        echo "Failed: " . $results['failed'] . "\n";

        if ($results['failed'] > 0) {
            echo "Some tests failed. Please review the errors.\n";
        } else {
            echo "All tests passed successfully.\n";
        }
    }
}
