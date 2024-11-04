import React, { useState, useContext } from 'react';

const EditModel = ({children, title, id="",  cls=""}) =>{
    return (
        <div className="modal" id="myModal" tabIndex="-1">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title">{title}</h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body p-0">
                        { children }
                    </div>
                </div>
            </div>
      </div>
    )
}
export default EditModel