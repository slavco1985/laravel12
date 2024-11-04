import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import Post from './Chart/Post';
import Message from './Chart/Message';
import Category from './Chart/Category';

export default function Dashboard(props) {
    return (
    <Authenticated
            auth={props.auth}
            errors={props.errors}
            current = {props.current}>
        
        <div className="">
            <div className="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div className="co mb-3 widecol1">
                    <div className="card radius-10 border-start carddeom border-0 border-3 border-info">
                        <div className="card-body">
                            <div className="d-flex align-items-center">
                                <div>
                                <p className="mb-0 text-secondary">Total Categories</p>
                                <h4 className="my-1 text-info">{ props.count.category }</h4>
                                <p className="mb-0 "><small>Total Number of Categories</small></p>
                                </div>
                                <div className="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                    <i className='bx bxs-cart'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="col mb-3">
                    <div className="card radius-10 border-start carddeom border-0 border-3 border-danger">
                        <div className="card-body">
                            <div className="d-flex align-items-center">
                                <div>
                                <p className="mb-0 text-secondary">Total Listings</p>
                                <h4 className="my-1 text-danger">{ props.count.listing }</h4>
                                <p className="mb-0 font-13"><small>Total Number of Listings</small></p>
                                </div>
                                <div className="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i className='bx bxs-wallet'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="col mb-3">
                    <div className="card radius-10 border-start carddeom border-0 border-3 border-success">
                        <div className="card-body">
                            <div className="d-flex align-items-center">
                                <div>
                                <p className="mb-0 text-secondary">Total Users</p>
                                <h4 className="my-1 text-success">{ props.count.user }</h4>
                                <p className="mb-0 font-13"><small>Total No of Active Users</small></p>
                                </div>
                                <div className="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i className='bx bxs-bar-chart-alt-2' ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="col mb-3">
                    <div className="card radius-10 border-start carddeom border-0 border-3 border-warning">
                        <div className="card-body">
                            <div className="d-flex align-items-center">
                                <div>
                                <p className="mb-0 text-secondary">Total Blogs</p>
                                <h4 className="my-1 text-warning">{ props.count.blog }</h4>
                                <p className="mb-0 font-13"><small>Total Number of Blogs</small></p>
                                </div>
                                <div className="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i className='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="" id="limit" value="10" />

        {/* <!------- Chart Row Start Here -----------> */}

            <div className="row   chart-row mt-3">
                <div className="col-12 col-lg-6 mb-3 col-xl-6">
                    <div className="chart-cover">
                        <div className="card-header">
                        Listings Posted in Last 7 Days
                        </div>
                        <div className="card-body">
                            <Post listing={props.listing} />
                        </div>
                    </div>
                </div>
                <div className="col-12 col-lg-6 mb-3 col-xl-6">
                    <div className="chart-cover">
                        <div className="card-header">
                            Messages Recieved in Last 7 Months
                        </div>
                        <div className="card-body">
                            <Message message={props.message} />
                        </div>
                    </div>
                </div>

                <div className="col-12 col-lg-12 mt-4 col-xl-12">
                    <div className="chart-cover">
                        <div className="card-header">
                           Listing by Category
                        </div>
                        <div className="card-body">
                            <Category category={props.category} />
                        </div>
                    </div>
                </div>
             </div>
        </div>

    </Authenticated>
    );
}
