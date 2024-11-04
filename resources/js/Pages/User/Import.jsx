import React, { useState } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import { useForm } from '@inertiajs/react'
import ListImport from '../Admin/Import/Inc/ListImport';
import ImageUpload from '../Admin/Import/Inc/ImageUpload';
import Products from '../Admin/Import/Inc/Products';
import ProductImages from '../Admin/Import/Inc/ProductImages';

const Import = (props) =>{

    const { data, setData, put, processing, errors, delete: destroy } = useForm({
        message: '',
    })

    return (
        <User>
           <Path title="Reviews" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    <div className="row">
                                        <div className="col-md-10 mx-auto">
                                            <ListImport err={props.errors} success={props.success} /> <br />
                                            <Products err={props.errors} success={props.success} business={props.business} /> <br />
                                            <ImageUpload /> <br />
                                            <ProductImages /> <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                </div>
        </User>
        
    )
}
export default Import