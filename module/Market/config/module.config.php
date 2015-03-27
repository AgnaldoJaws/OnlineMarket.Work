<?php
return array(
		'router' => array(
				'routes' => array(
						'market-view'=> array(
								'type'=>'literal',
								'options'=>array(
										'route'=>'/market/view',
										'defaults'=>array(
												'controller'=>'market-view-controller',
												'action'=>'index',
									),
								),

								'may_terminate' => true,
								'child_routes' => array(
										#rota filha
										'index' => array(
												'type'    => 'Segment',
												'options' => array(
														'route'    => '/main[/:category][/]',
														'defaults' => array(
																'controller'=>'market-view-controller',
																'action'=>'index'
												),
											),
										),

										'item'=>array(
												'type'=>'Segment',
												'options'=>array(
														'route'=>'/item[/:itemId]',
														'defaults'=>array(
																'action'=>'item',
														),
														'constraints'=> array(
																'itemId'=>'[0-9]*'
										              )
									              )
								             )
							             ),
						             ),#final view-market

						'market'=>array(
								'type'=>'literal',
								'options'=>array(
										'route'=> '/market',
										'defaults'=> array(
												'controller'=>'market-index-controller',
												'action'=>'index'
								   ),
								),

								'may_terminate'=> true,
								'child_routes'=>array(
										'slash' => array(
												'type'    => 'Literal',
												'options' => array(
														'route'    => '/',
														'defaults' => array(
																'controller'    => 'market-index-controller',
																'action'        => 'index',
								    		   ),
										   ),
										),

										'post'=> array(
												'type'=>'Segment',
												'options'=>array(
														'route'=>'/post',
														'defaults'=>array(
																'controller'=>'market-post-controller',
																'action'=>'index',
												    ),
												),

												'may_terminate'=> true,
												'child_routes'=>array(
														'slash' => array(
																'type'    => 'Literal',
																'options' => array(
																		'route'    => '/',
																		'defaults' => array(
																				'controller'    => 'market-post-controller',
																				'action'        => 'index',
														      ),
													       ),
												        ),
											          ),
										            ),

										'view'=>array(
												'type'=>'Segment',
												'options'=>array(
														'route'=>'/view',
														'defaults'=>array(
																'controller'=>'market-view-controller',
																'action'=>'index',
													),
												),

							'may_terminate'=> true,
								'child_routes'=>array(
								    'slash' => array(
										'type'    => 'Literal',
											'options' => array(
											    'route'    => '/',
												'defaults' => array(
												'controller'    => 'market-view-controller',
												'action'        => 'index',
								 ),
							   ),
							),
						  ),
					   )
				   ),
			    )#final market
	     	)
		),

		'controllers' => array(
				'invokables' => array(
						'market-index-controller' => 'Market\Controller\IndexController',
						'market-view-controller'=> 'Market\Controller\ViewController'
				),
				'factories'=>array(
						#quando chamar o market-p-c, a factory será executada
						#vai executar o createService, vai pegar
						#os serviços da categoria, vai instanciar
						#o controller, vai dar um setCategories no controller
						# e retorna o controller
						'market-post-controller'=>'Market\Factory\PostControllerFactory'

				),
				'aliases'=>array(
						'alt'=>'market-view-controller'

				)
		),

		'view_manager' => array(
				'template_path_stack' => array(
						__DIR__ . '/../view',
				),
		),
);


