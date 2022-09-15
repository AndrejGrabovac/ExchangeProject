<?php

class DatabaseException extends Exception
{
    /**
     * DatabaseException extenda exception
     *
     * @author Andrej Grabovac
     */
    public function show()
    {
        /**
         * funkcija show() prikazuje eror na stranicu ako ga ima
         *
         * @return string
         */

        return ('Error: ' . $this->getMessage() .
            'File: ' . $this->getFile() .
            'Line: ' . $this->getLine() .
            'StackTrace: ' . $this->getTraceAsString()
        );
    }
}



?>