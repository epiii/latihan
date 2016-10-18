<?php
 class SVM {
	 // integer
	const  C_SVC = 0;
	// var_dump(C_SVC);
 // xit();
	 // integer
	const NU_SVC = 1 ;
	 // integer
	const ONE_CLASS = 2 ;
	 // integer
	const EPSILON_SVR = 3 ;
	 // integer
	const NU_SVR = 4 ;
	 // integer
	const KERNEL_LINEAR = 0 ;
	 // integer
	const KERNEL_POLY = 1 ;
	 // integer
	const KERNEL_RBF = 2 ;
	 // integer
	const KERNEL_SIGMOID = 3 ;
	 // integer
	const KERNEL_PRECOMPUTED = 4 ;
	 // integer
	const OPT_TYPE = 101 ;
	 // integer
	const OPT_KERNEL_TYPE = 102 ;
	 // integer
	const OPT_DEGREE = 103 ;
	 // integer
	const OPT_SHRINKING = 104 ;
	 // integer
	const OPT_PROPABILITY = 105 ;
	 // integer
	const OPT_GAMMA = 201 ;
	 // integer
	const OPT_NU = 202 ;
	 // integer
	const OPT_EPS = 203 ;
	 // integer
	const OPT_P = 204 ;
	 // integer
	const OPT_COEF_ZERO = 205 ;
	 // integer
	const OPT_C = 206 ;
	 // integer
	const OPT_CACHE_SIZE = 207 ;
	/* Methods */
	public function __construct(){}
	public float function svm::crossvalidate ( array $problem , int $number_of_folds ){}
	public array getOptions ( void )
	public bool setOptions ( array $params )
	public SVMModel svm::train ( array $problem [, array $weights ] )
}
?>