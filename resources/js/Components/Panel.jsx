import React, { useState, useContext } from 'react';

const Panel = ({children, title,  lg, md}) =>{
    return (
            <div className={`col-lg-${lg} col-md-${md} float-auto`}>
                <div className="panel-card">
                    <div className="panel-header"> { title } </div>
                    <div>
                        { children }
                    </div>
                </div>
            </div>
       
    )
}
export default Panel